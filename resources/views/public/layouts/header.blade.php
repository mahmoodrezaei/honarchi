<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ @csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/material-kit.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/fontawesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/light.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/brands.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/jasny-bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/owl.theme.default.min.css') }}">

    @yield('page-styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/responsive.css') }}">

    <title>هنرچی ،دست ساخته های ایرانی</title>
</head>
<body class="home-page">
<script type="text/javascript" src="{{ asset('js/front/buttons.js') }}"></script>
<!-- Start Header -->
<section class="container-fluid top-bar"></section>
<section class="container-fluid top-header bg-ff">

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 logo-area">
                <a href="/">
                    <img src="{{ asset('assets/images/front/logo.svg') }}" alt="هنرچی">
                </a>
            </div>
            <div class="col-12 col-md-8 col-lg-9 user-menu text-center text-md-left text-lg-left">
                <ul class="user-menu-ul">
                    <li id="search-form" class="search-form w-50">
                        <div class="input-group ">
                            <input type="search" class="form-control" placeholder="محصول موردنظرت رو پیدا کن...">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                     <i class="fal fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </li>

                    <li id="profile" class="profile">
                        <a class="profile-link" href="#">
                            <i class="fal fa-user"></i>
                        </a>
                        <!-- is-login -->

                        @auth
                            <ul class="tooltip-profile cart-tooltip p-2">
                                <li class="d-block text-right mb-1">
                                    <a class="d-block" href="/profile">
                                        <i class="fal fa-user ml-2 "></i>
                                        پروفایل
                                    </a>
                                </li>
                                <li class="d-block text-right mb-1">
                                    <a class="d-block" href="/profile/my-orders">
                                        <i class="fal fa-shopping-basket ml-2"></i>
                                        سفارش های من
                                    </a>
                                </li>
                                <li class="d-block text-right  mb-1">
                                    <a class="d-block" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fal fa-sign-out ml-2"></i>
                                        خروج از حساب کاربری
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        @else
                            <ul class="tooltip-profile cart-tooltip p-2">
                                <div class="login-link text-center">
                                    <button onclick="location.replace('/login')" class="btn btn-primary btn-round">
                                        <i class="fal fa-sign-in ml-2"></i>
                                        ورود به هنرچی
                                    </button>
                                </div>
                                <br>
                                <hr>
                                <div class="register-link text-center mt-2">
                                    <p>کاربر جدید هستید ؟
                                        <a class="clr-blue2" href="/register">ثبت نام</a>
                                    </p>
                                </div>
                            </ul>
                        @endauth

                    </li>

                    @auth
                        <li id="wishlist" class="wishlist">
                            <a class="wishlist-link" href="/profile/wishlist">
                                <i class="fal fa-heart"></i>
                            </a>
                        </li>
                    @endauth

                    <li id="heder-cart" class="header-cart">
                        <a class="p-0 mr-2 header-cart-link" href="#">
                            <div class="cart-count-area">
                                <span class="cart-count">0</span>
                            </div>
                            <i class="fal fa-shopping-cart"></i>
                        </a>
                        <!-- cart-NOT-empty -->
                    {{--<ul class="cart-tooltip text-center">
                        <li class="product-sty1">
                            <a href="#">
                                <img  class="img-sty1" src="images/accessory/minicart01.jpg" alt="هفت سین">
                                <h3 class="header-sty1">سرویس هفت سین طرح شیرین و فرهاد</h3>
                            </a>
                            <div class="price-product-sty1">
                                <span class="price-sty1">
                                    2400
                                </span>
                                <span class="unitmoney">
                                    تومان
                                </span>
                                <br>
                                <span class="Lquantity-sty1">
                                    تعداد :
                                </span>
                                <span class="quantity-sty1">
                                    2
                                </span>
                            </div>
                            <a class="remove-item" href="#">
                                <i class="fal fa-trash-alt"></i>
                            </a>
                        </li>
                        <hr>
                        <li class="product-sty1">
                            <a href="#">
                                <img  class="img-sty1" src="images/accessory/minicart01.jpg" alt="هفت سین">
                                <h3 class="header-sty1">سرویس هفت سین طرح شیرین و فرهاد</h3>
                            </a>
                            <div class="price-product-sty1">
                                <span class="price-sty1">
                                    2400
                                </span>
                                <span class="unitmoney">
                                    تومان
                                </span>
                                <br>
                                <span class="Lquantity-sty1">
                                    تعداد :
                                </span>
                                <span class="quantity-sty1">
                                    2
                                </span>
                            </div>
                            <a class="remove-item" href="#">
                                <i class="fal fa-trash-alt"></i>
                            </a>
                        </li>
                        <hr>
                        <li class="product-sty1">
                            <a href="#">
                                <img  class="img-sty1" src="{{ asset('assets/images/front/accessory/minicart01.jpg') }}" alt="هفت سین">
                                <h3 class="header-sty1">سرویس هفت سین طرح شیرین و فرهاد</h3>
                            </a>
                            <div class="price-product-sty1">
                                <span class="price-sty1">
                                    2400
                                </span>
                                <span class="unitmoney">
                                    تومان
                                </span>
                                <br>
                                <span class="Lquantity-sty1">
                                    تعداد :
                                </span>
                                <span class="quantity-sty1">
                                    2
                                </span>
                            </div>
                            <a class="remove-item" href="#">
                                <i class="fal fa-trash-alt"></i>
                            </a>
                        </li>
                        <div class="area-btn">
                            <button type="button" class="btn btn-round btn-info">تسویه حساب</button>
                            <button type="button" class="btn btn-round btn-success">سبدخرید</button>
                        </div>
                    </ul>--}}
                    <!-- cart-empty -->
                        <ul class="tooltip-empty cart-tooltip text-center">
                            <div class="img-empty">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 84 133" style="enable-background:new 0 0 84 133;" xml:space="preserve">
														<filter  filterUnits="objectBoundingBox" height="250%" id="a" width="111.8%" x="-5.9%" y="-75%">
                                                            <feGaussianBlur  in="SourceGraphic" stdDeviation="1"></feGaussianBlur>
                                                        </filter>
                                    <g transform="translate(-3 -8)">
                                        <path style="fill:none;stroke:#616161;stroke-width:3;stroke-linecap:round;" d="M51.1,14.6L29.5,9.9c-3.4-0.7-6.8,1.1-8,4.3
																L5.1,56.8c-1.2,3.2,0.1,6.9,3.1,8.6L47,87.6c1.4,0.8,3.3,0.3,4.1-1.1c0.1-0.1,0.1-0.3,0.2-0.4l24.1-62.7c0.6-1.5-0.2-3.3-1.7-3.9
																c-0.1-0.1-0.3-0.1-0.4-0.1l-15-3.3"/>
                                        <path style="fill:none;stroke:#616161;stroke-width:3;stroke-linecap:round;" d="M50.6,67.5l6.7,2.6c8.5,3.3,18-1,21.3-9.5
																c3.3-8.5-1-18-9.5-21.3L55.4,34 M53.6,68.6l-3.5-1.3 M46.2,65.8l-2.6-1"/>
                                        <g style="opacity:0.499;filter:url(#a);enable-background:new    ;">
                                            <ellipse style="fill-rule:evenodd;clip-rule:evenodd;fill:#E0E0E0;" cx="46.5" cy="137" rx="25.5" ry="2"/>
                                        </g>
                                        <path style="fill:none;stroke:#616161;stroke-linecap:round;stroke-dasharray:3,3;" d="M60,80c17.3,3.8,30.8,36.9,6.5,30
																c-12.1-3.4-3.2-19.2,6.8-10.7c4.2,3.6,4,10.8-0.6,21.6 M73.5,77c4.7,1.1,9,4.3,12.4,8.3"/>
                                    </g>
													</svg>

                            </div>
                            <p>سبد خرید شما خالی است</p>
                        </ul>
                    </li>
                </ul>
            </div>


        </div>
    </div>

</section>

@include('public.layouts.nav')

<section class="container-fluid svg-bg p-0">
    <div class="svg-area">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 500 31.5" style="enable-background:new 0 0 500 31.5;" xml:space="preserve">
			<style type="text/css">
                .st0{opacity:0.33;fill:#F5F5F5;enable-background:new    ;}
                .st1{opacity:0.66;fill:#F5F5F5;enable-background:new    ;}
                .st2{fill:#F5F5F5;}
            </style>
            <path class="st0" d="M236.5,21.2c-101.9,27.7-131.6-10.6-160.1,0C33,37.4,0,18.8,0,18.8V0.1h500v18.7c0,0-31,8.2-47.5,9.2
				c-16.4,1-31.4-3.9-37.9-6.9c-11.6-5.4-42-18.2-67.2-19.5S246.2,18.6,236.5,21.2z"/>
            <path class="st1" d="M367,21.2c-22.8,0-38.6-7.3-64.5-12.2c-14.3-2.7-75.1-3.2-127,12.2s-45.9-10.8-74.6,0C57.8,37.2,0,12.6,0,12.6
				V0.1h500v11.4c0,0-14.1-5.8-46-5.8C405.1,5.8,387.9,21.2,367,21.2z"/>
            <path class="st2" d="M383,9.2c-100-18-133,20.5-197.6,6.1C121,0.7,121,1.8,92.4,6.6C64,11.3,66.2,14.2,45,16.6
			C14.3,20.1,0,0.1,0,0.1h500c0,0-5,12.8-41.8,15.1S414.8,14.8,383,9.2z"/>
		</svg>

    </div>
</section>
<!-- End Header -->