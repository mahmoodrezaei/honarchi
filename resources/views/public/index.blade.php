<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/material-kit.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/fontawesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/light.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/brands.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/jasny-bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/owl.theme.default.min.css') }}">
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
                <a href="#">
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
                        <!-- <ul class="tooltip-profile cart-tooltip p-2">
                            <li class="d-block text-right mb-1">
                                <a class="d-block" href="#">
                                    <i class="fal fa-user ml-2 "></i>
                                    پروفایل
                                </a>
                            </li>
                            <li class="d-block text-right mb-1">
                                <a class="d-block" href="#">
                                    <i class="fal fa-shopping-basket ml-2"></i>
                                    سفارش های من
                                </a>
                            </li>
                            <li class="d-block text-right  mb-1">
                                <a class="d-block" href="#">
                                    <i class="fal fa-sign-out ml-2"></i>
                                    خروج از حساب کاربری
                                </a>
                            </li>
                        </ul> -->
                        <ul class="tooltip-profile cart-tooltip p-2">
                            <div class="login-link text-center">
                                <button class="btn btn-primary btn-round">
                                    <i class="fal fa-sign-in ml-2"></i>
                                    ورود به هنرچی
                                </button>
                            </div>
                            <br>
                            <hr>
                            <div class="register-link text-center mt-2">
                                <p>کاربر جدید هستید ؟
                                    <a class="clr-blue2" href="#">ثبت نام</a>
                                </p>
                            </div>
                        </ul>
                    </li>

                    <li id="wishlist" class="wishlist">
                        <a class="wishlist-link" href="#">
                            <i class="fal fa-heart"></i>
                        </a>
                    </li>

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

<section class="container-fluid header bg-f5 py-3 d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-12 mainmenu-area text-right">
                <ul class="mainmenu ">
                    <li class="menu-items">
                        <a class="clr-26 fs-18 px-2" href="#">زیورآلات و اکسسوری</a>
                    </li>
                    <li class="menu-items">
                        <a class="clr-26 fs-18 px-2" href="#">خانه و آشپزخانه</a>
                    </li>
                    <li class="menu-items">
                        <a class="clr-26 fs-18 px-2" href="#">مد و پوشاک</a>
                        <div class="sub-menu container" style="background : url(images/accessory/mm-01.png) #fff ;background-repeat: no-repeat;background-position: left bottom;background-size: contain;" >
                            <div class="row">
                                <div class="col-9 sub-col">
                                    <div class="sub-items ">
                                        <ul class="row px-3">
                                            <li class="col-3 sub-menu-list">
                                                <ul>
                                                    <li>
                                                        <h6 class="sub-menu-title">
                                                            <i class="fal fa-atom"></i>
                                                            لباس زنانه
                                                        </h6>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            شال و روسری
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            بلوز
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            پیراهن/پیراهن شلوار
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            تی شرت
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            دامن
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            شلوار و شلوارک
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="col-3 sub-menu-list">
                                                <ul>
                                                    <li>
                                                        <h6 class="sub-menu-title">
                                                            <i class="fal fa-bullhorn"></i>
                                                            کیف و کوله پشتی زنانه
                                                        </h6>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            ساک خرید
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            کیف
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            کیف پول و کارت
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <h6 class="sub-menu-title">
                                                            <i class="fal fa-axe"></i>
                                                            کودکان
                                                        </h6>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            مد و پوشاک
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="col-3 sub-menu-list">
                                                <ul>
                                                    <li>
                                                        <h6 class="sub-menu-title">
                                                            <i class="fal fa-balance-scale"></i>
                                                            کف و کوله پشتی مردانه
                                                        </h6>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            کیف
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            کیف پول و کارت
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            ساک خرید
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <h6 class="sub-menu-title">
                                                            <i class="fal fa-axe"></i>
                                                            لباس مردانه
                                                        </h6>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            به زودی ...
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="col-3 sub-menu-list">
                                                <ul>
                                                    <li>
                                                        <h6 class="sub-menu-title">
                                                            <i class="fal fa-acorn"></i>
                                                            کفش و صندل زنانه
                                                        </h6>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            به زودی ...
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <h6 class="sub-menu-title">
                                                            <i class="fal fa-alarm-clock"></i>
                                                            کفش و صندل مردانه
                                                        </h6>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            به زودی ...
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-3 sub-col">
                                    <div class="sub-mod">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-items">
                        <a class="clr-26 fs-18 px-2" href="#">اسباب بازی و سرگرمی</a>
                    </li>
                    <li class="menu-items">
                        <a class="clr-26 fs-18 px-2" href="#">نقاشی و طراحی</a>
                    </li>
                    <li class="menu-items">
                        <a class="clr-26 fs-18 px-2" href="#">عتیقه جات</a>
                    </li>
                    <li class="menu-items">
                        <a class="clr-26 fs-18 px-2" href="#">مواداولیه وابزار</a>
                    </li>
                    <a class="p-2 p-md-0 float-left" href="#">
                        <i class="clr-red fs-25 fal fa-gift" data-toggle="tooltip" data-placement="bottom" title="دنبال خرید کادویی ؟ "></i>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid header bg-f5 py-3 px-2 d-block d-lg-none">
    <div class="mainmenu-mobile">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <a class="btn btn-primary btn-round" href="#">زیورآلات و اکسسوری</a>
            </div>
            <div class="item">
                <a class="btn btn-primary btn-round" href="#">زیورآلات و اکسسوری</a>
            </div>
            <div class="item">
                <a class="btn btn-primary btn-round" href="#">زیورآلات و اکسسوری</a>
            </div>
            <div class="item">
                <a class="btn btn-primary btn-round" href="#">زیورآلات و اکسسوری</a>
            </div>
            <div class="item">
                <a class="btn btn-primary btn-round" href="#">زیورآلات و اکسسوری</a>
            </div>
            <div class="item">
                <a class="btn btn-primary btn-round" href="#">زیورآلات و اکسسوری</a>
            </div>
        </div>
    </div>
</section>

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

<!-- Slider section -->
<section class="container-fluid row-slider pt-0 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 banner-slider ">
                <a href="#">
                    <img class="bx-sh d-none d-lg-block" src="{{ asset('assets/images/front/honarchiplus.png') }}" alt="">
                    <img class="bx-sh d-block d-lg-none mb-3" src="{{ asset('assets/images/front/honarchiplus-m.png') }}" alt="">
                </a>
            </div>
            <div class="col-12 col-lg-9 Ho-slider">
                <div class="owl-carousel owl-theme bx-sh">
                    <div class="item">
                        <a href="#"><img src="{{ asset('assets/images/front/accessory/slider03.jpg') }}" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('assets/images/front/accessory/slider02.jpg') }}" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('assets/images/front/accessory/slider04.jpg') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Slider section -->

<!-- Start Services & real chanse -->
<section class="bg-img services-chanse">
    <section class="container-fluid row-services pb-5">
        <div class="container">
            <div class="row pb-1 m-0 bg-ff bx-sh">
                <div class="col-6 col-lg-3 service">
                    <figure class="content-service">
                        <img src="{{ asset('assets/images/front/uni-product.svg') }}" alt="">
                        <h4 class="fs-16 p-2 text-center">محصولات خاص و منحصر به فرد</h4>
                    </figure>
                </div>
                <div class="col-6 col-lg-3 service">
                    <figure class="content-service">
                        <img src="{{ asset('assets/images/front/support24.svg') }}" alt="">
                        <h4 class="fs-16 p-2 text-center">پشتیبان تلفنی و خرید امن</h4>
                    </figure>
                </div>
                <div class="col-6 col-lg-3 service">
                    <figure class="content-service">
                        <img src="{{ asset('assets/images/front/handicraft.svg') }}" alt="">
                        <h4 class="fs-16 p-2 text-center">کالاهای دست سازه و اصیل</h4>
                    </figure>
                </div>
                <div class="col-6 col-lg-3 service">
                    <figure class="content-service">
                        <img src="{{ asset('assets/images/front/iranian.svg') }}" alt="">
                        <h4 class="fs-16 p-2 text-center">کمک به رونق اقتصادی کشور</h4>
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid row-chanse pt-0 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9 order-2 order-lg-1 column-chanse">
                    <div class="col-chanse bx-sh pt-5 pb-4">
                        <div class="row m-0">
                            <div class="d-none d-lg-block col-lg-3 tabnav">
                                <ul class="nav nav-pills nav-pills-rose flex-column p-0">
                                    <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab">کوله شولبا گوئش</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">کیف پول ترکیبی بته جقه</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab3" data-toggle="tab">کیف پول زنانه بته جقه</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab4" data-toggle="tab">کیف پول کتی مردانه</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab5" data-toggle="tab">کیف دوشی دخترانه</a></li>
                                </ul>
                                <button class="btn btn-danger btn-round btn-chanse btn-circle position-relative fs-16">
                                    <i class="fal fa-arrow-left clr-red fs-20 position-relative"></i>
                                    مشاهده ی همه ی شانس ها
                                </button>
                            </div>
                            <div class="col-lg-9 tabcontent">
                                <h3 class="clr-b2 fs-20">شانس های واقعی</h3>
                                <div class="tab-content text-right">
                                    <div class="tab-pane active" id="tab1">
                                        <div class="row prouct-sty2">
                                            <div class="col-6">
                                                <a class="header-sty2" href="#">
                                                    <h3 class="mb-0 header-gradient">کوله شولبا گوئش</h3>
                                                </a>
                                                <div class="price-sty2">
                                                    <del class="d-block text-left clr-b2 mb-2 px-5">
                                                        <span>15000</span>
                                                        <span class="unitmoney">
																	تومان
																</span>
                                                    </del>
                                                    <ins  class="d-block text-left clr-red px-5">
                                                        <span>13000</span>
                                                        <span class="unitmoney">
																	تومان
																</span>
                                                    </ins>
                                                </div>

                                            </div>
                                            <div class="col-6">
                                                <div class="badge-sty2">
                                                    <span class="percentage fs-14">20 %</span>
                                                    <span class="lable-percentage">تخفیف</span>
                                                </div>
                                                <a class="thumnail-sty2" href="#">
                                                    <img src="{{ asset('assets/images/front/accessory/01.png') }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <div class="row prouct-sty2">
                                            <div class="col-6">
                                                <a class="header-sty2" href="#">
                                                    <h3 class="mb-0 header-gradient">کیف پول ترکیبی بته جقه</h3>
                                                </a>
                                                <div class="price-sty2">
                                                    <del class="d-block text-left clr-b2 mb-2 px-5">
                                                        <span>15000</span>
                                                        <span class="unitmoney">
																	تومان
																</span>
                                                    </del>
                                                    <ins  class="d-block text-left clr-red px-5">
                                                        <span>13000</span>
                                                        <span class="unitmoney">
																	تومان
																</span>
                                                    </ins>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="badge-sty2">
                                                    <span class="percentage fs-14">20 %</span>
                                                    <span class="lable-percentage">تخفیف</span>
                                                </div>
                                                <a class="thumnail-sty2" href="#">
                                                    <img src="{{ asset('assets/images/front/accessory/01.png') }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <div class="row prouct-sty2">
                                            <div class="col-6">
                                                <a class="header-sty2" href="#">
                                                    <h3 class="mb-0 header-gradient">کوله شولبا گوئش</h3>
                                                </a>
                                                <div class="price-sty2">
                                                    <del class="d-block text-center clr-b2 mb-2 pr-5">
                                                        <span>15000</span>
                                                        <span class="unitmoney">
																	تومان
																</span>
                                                    </del>
                                                    <ins  class="d-block text-center clr-red pr-5">
                                                        <span>13000</span>
                                                        <span class="unitmoney">
																	تومان
																</span>
                                                    </ins>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="badge-sty2">
                                                    <span class="percentage fs-14">20 %</span>
                                                    <span class="lable-percentage">تخفیف</span>
                                                </div>
                                                <a class="thumnail-sty2" href="#">
                                                    <img src="{{ asset('assets/images/front/accessory/01.png') }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab4">
                                        <div class="row prouct-sty2">
                                            <div class="col-6">
                                                <a class="header-sty2" href="#">
                                                    <h3 class="mb-0 header-gradient">کوله شولبا گوئش</h3>
                                                </a>
                                                <div class="price-sty2">
                                                    <del class="d-block text-center clr-b2 mb-2 pr-5">
                                                        <span>15000</span>
                                                        <span class="unitmoney">
																	تومان
																</span>
                                                    </del>
                                                    <ins  class="d-block text-center clr-red pr-5">
                                                        <span>13000</span>
                                                        <span class="unitmoney">
																	تومان
																</span>
                                                    </ins>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="badge-sty2">
                                                    <span class="percentage fs-14">20 %</span>
                                                    <span class="lable-percentage">تخفیف</span>
                                                </div>
                                                <a class="thumnail-sty2" href="#">
                                                    <img src="{{ asset('assets/images/front/accessory/01.png') }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab5">
                                        <div class="row prouct-sty2">
                                            <div class="col-6">
                                                <a class="header-sty2" href="#">
                                                    <h3 class="mb-0 header-gradient">کوله شولبا گوئش</h3>
                                                </a>
                                                <div class="price-sty2">
                                                    <del class="d-block text-left clr-b2 mb-2 px-5">
                                                        <span>15000</span>
                                                        <span class="unitmoney">
																	تومان
																</span>
                                                    </del>
                                                    <ins  class="d-block text-left clr-red px-5">
                                                        <span>13000</span>
                                                        <span class="unitmoney">
																	تومان
																</span>
                                                    </ins>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="badge-sty2">
                                                    <span class="percentage fs-14">20 %</span>
                                                    <span class="lable-percentage">تخفیف</span>
                                                </div>
                                                <a class="thumnail-sty2" href="#">
                                                    <img src="{{ asset('assets/images/front/accessory/01.png') }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="d-block d-lg-none btn btn-danger btn-round btn-chanse btn-circle position-relative fs-16">
                                    <i class="fal fa-arrow-left clr-red fs-20 position-relative"></i>
                                    مشاهده ی همه ی شانس ها
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 order-1 order-lg-2 banner-chanse">
                    <a href="#">
                        <img class="bx-sh d-none d-lg-block" src="{{ asset('assets/images/front/wholesale.png') }}" alt="">
                        <img class="bx-sh d-block d-lg-none mb-3" src="{{ asset('assets/images/front/wholesale-m.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section  class="container-fluid row-category">
        <div class="container">
            <h3 class="header-gradient fs-25 text-center dastnevis mb-5">لذت انتخاب دست ساخته های ایرانی در :</h3>
            <div class="row">
                <div class="col-lg-6 mb-4 content-category">
                    <div class="sty-cat bx-sh bg-ff iransans">
                        <a href="#">
                            <h3 class="title-cat header-gradient iransans pr-5 fs-20 mt-1  mb-4">چیدمان متفاوت هفت سین</h3>
                            <h4 class="subtitle-cat clr-42 iransans fs-14 pr-5">سرویس سرامیک و سفال</h4>
                            <img class="img-cat" src="{{ asset('assets/images/front/accessory/01.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 mb-4 content-category">
                    <div class="sty-cat bx-sh bg-ff iransans">
                        <a href="#">
                            <h3 class="title-cat header-gradient  iransans pr-5 fs-20 mt-1 mb-4">چیدمان متفاوت هفت سین</h3>
                            <h4 class="subtitle-cat clr-42 iransans fs-14 pr-5">سرویس سرامیک و سفال</h4>
                            <img class="img-cat" src="{{ asset('assets/images/front/accessory/02.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 mb-4 content-category">
                    <div class="sty-cat bx-sh bg-ff iransans">
                        <a href="#">
                            <h3 class="title-cat header-gradient iransans pr-5 fs-20 mt-1 mb-4">چیدمان متفاوت هفت سین</h3>
                            <h4 class="subtitle-cat clr-42 iransans fs-14 pr-5">سرویس سرامیک و سفال</h4>
                            <img class="img-cat" src="{{ asset('assets/images/front/accessory/03.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 mb-4 content-category">
                    <div class="sty-cat bx-sh bg-ff iransans">
                        <a href="#">
                            <h3 class="title-cat header-gradient  iransans pr-5 fs-20 mt-1 mb-4">چیدمان متفاوت هفت سین</h3>
                            <h4 class="subtitle-cat clr-42 iransans fs-14 pr-5">سرویس سرامیک و سفال</h4>
                            <img class="img-cat" src="{{ asset('assets/images/front/accessory/01.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 mb-4 content-category">
                    <div class="sty-cat bx-sh bg-ff iransans">
                        <a href="#">
                            <h3 class="title-cat header-gradient  iransans pr-5 fs-20 mt-1 mb-4">چیدمان متفاوت هفت سین</h3>
                            <h4 class="subtitle-cat clr-42 iransans fs-14 pr-5">سرویس سرامیک و سفال</h4>
                            <img class="img-cat" src="{{ asset('assets/images/front/accessory/02.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 mb-4 content-category">
                    <div class="sty-cat bx-sh bg-ff iransans">
                        <a href="#">
                            <h3 class="title-cat header-gradient iransans pr-5 fs-20 mt-1 mb-4">چیدمان متفاوت هفت سین</h3>
                            <h4 class="subtitle-cat clr-42 iransans fs-14 pr-5">سرویس سرامیک و سفال</h4>
                            <img class="img-cat" src="{{ asset('assets/images/front/accessory/03.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</section>
<!-- End Services & real chanse -->

<!-- gift section -->
<section class="container-fluid row-gift">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-5">
                <img src="{{ asset('assets/images/front/mandegaar.png') }}" alt="">
            </div>
            <div class="d-none d-xl-block col-xl-1">
            </div>
            <div class="col-lg-6 col-xl-6 m-auto">
                <div class="row">
                    <div class="col-6 col-lg-6 mb-4">
                        <a href="#">
                            <div class="content-gift bx-sh bg-ff p-3">
                                <div class="gift-img text-right">
                                    <img src="{{ asset('assets/images/front/accessory/01.png') }}" alt="">
                                </div>
                                <div class="gift-title position-absolute text-center">
                                    <h3 class="dastnevis fs-18 clr-75">برای کودکان</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-6 mb-4">
                        <a href="#">
                            <div class="content-gift bx-sh bg-ff p-3">
                                <div class="gift-img text-right">
                                    <img src="{{ asset('assets/images/front/accessory/03.png') }}" alt="">
                                </div>
                                <div class="gift-title position-absolute text-center">
                                    <h3 class="dastnevis fs-18 clr-75">برای آقایان</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-6 mb-4">
                        <a href="#">
                            <div class="content-gift bx-sh bg-ff p-3">
                                <div class="gift-img text-right">
                                    <img src="{{ asset('assets/images/front/accessory/02.png') }}" alt="">
                                </div>
                                <div class="gift-title position-absolute text-center">
                                    <h3 class="dastnevis fs-18 clr-75">برای خانم ها</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-6 mb-4">
                        <a href="#">
                            <div class="content-gift bx-sh bg-ff p-3">
                                <div class="gift-img text-right">
                                    <img src="{{ asset('assets/images/front/accessory/03.png') }}" alt="">
                                </div>
                                <div class="gift-title position-absolute text-center">
                                    <h3 class="dastnevis fs-18 clr-75">برای سالکرد</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- new products section -->
<section class="container-fluid row-product px-4 bg-product">
    <div class=" container">
        <div class="row">
            <div class="col-12 title-products">
                <div class="row align-items-end">
                    <div class="col-7 col-lg-9 col-xl-10 text-right">
                        <h3 class="pro-title fs-18 iransans header-gradient text-center d-inline-block px-4 mb-0 pb-2">جـدیدترین محصـولات</h3>
                    </div>
                    <div class="col-5 col-lg-3 col-xl-2">
                        <button class="btn btn-round btn-title dastnevis fs-18 bg-ff btn-outline-secondary py-2 m-0">مشاهده همه</button>
                    </div>
                </div>
                <hr class="under-title">
            </div>
        </div>
        <div class="row">
            <div class="col-12 row-products px-0">
                <div class="owl-carousel products owl-theme">
                    <div class="item">
                        <div class="content-product">
                            <div class="img-product">
                                <a href="#"><img src="{{ asset('assets/images/front/accessory/04.png') }}" alt=""></a>
                            </div>
                            <div class="title-product px-2">
                                <a href="#">
                                    <h3 class="iransans fs-16 clr-42 text-center">کیف مردانه بته چقه ای</h3>
                                    <h4 class="iransans fs-12 clr-61 text-center">کد 235126</h4>
                                </a>
                            </div>
                            <div class="badge-product">
                                <span class="percentage fs-14 bg-red">20 %</span>
                            </div>
                            <div class="wishlist-product">
                                <a href="#">
                                    <span class="wishlist fs-14 clr-75 text-right">دوسش دارم</span>
                                    <i class="fal fa-heart clr-red fs-20"></i>
                                </a>
                            </div>
                            <div class="price-product px-2">
                                <del class="d-block text-center clr-b2 mb-1 fs-14">
                                    <span>15000</span>
                                    <span class="unitmoney">
										تومان
									</span>
                                </del>
                                <ins  class="d-block text-center clr-red fs-14">
                                    <span>13000</span>
                                    <span class="unitmoney">
										تومان
									</span>
                                </ins>
                            </div>
                            <div class="add-to-cart-product position-absolute">
                                <a class="add-to-cart-link clr-ff bg-green rounded-circle" href="#">
                                    <i class="fal fa-shopping-cart clr-ff"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content-product">
                            <div class="img-product">
                                <a href="#"><img src="{{ asset('assets/images/front/accessory/04.png') }}" alt=""></a>
                            </div>
                            <div class="title-product px-2">
                                <a href="#">
                                    <h3 class="iransans fs-16 clr-42 text-center">کیف مردانه بته چقه ای</h3>
                                    <h4 class="iransans fs-12 clr-61 text-center">کد 235126</h4>
                                </a>
                            </div>
                            <div class="badge-product">
                                <span class="percentage fs-14 bg-red">20 %</span>
                            </div>
                            <div class="wishlist-product">
                                <a href="#">
                                    <span class="wishlist fs-14 clr-75 text-right">دوسش دارم</span>
                                    <i class="fal fa-heart clr-red fs-20"></i>
                                </a>
                            </div>
                            <div class="price-product px-2">
                                <del class="d-block text-center clr-b2 mb-1 fs-14">
                                    <span>15000</span>
                                    <span class="unitmoney">
										تومان
									</span>
                                </del>
                                <ins  class="d-block text-center clr-red fs-14">
                                    <span>13000</span>
                                    <span class="unitmoney">
										تومان
									</span>
                                </ins>
                            </div>
                            <div class="add-to-cart-product position-absolute">
                                <a class="add-to-cart-link clr-ff bg-green rounded-circle" href="#">
                                    <i class="fal fa-shopping-cart clr-ff"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content-product">
                            <div class="img-product">
                                <a href="#"><img src="{{ asset('assets/images/front/accessory/04.png') }}" alt=""></a>
                            </div>
                            <div class="title-product px-2">
                                <a href="#">
                                    <h3 class="iransans fs-16 clr-42 text-center">کیف مردانه بته چقه ای</h3>
                                    <h4 class="iransans fs-12 clr-61 text-center">کد 235126</h4>
                                </a>
                            </div>
                            <div class="badge-product">
                                <span class="percentage fs-14 bg-red">20 %</span>
                            </div>
                            <div class="wishlist-product">
                                <a href="#">
                                    <span class="wishlist fs-14 clr-75 text-right">دوسش دارم</span>
                                    <i class="fal fa-heart clr-red fs-20"></i>
                                </a>
                            </div>
                            <div class="price-product px-2">
                                <del class="d-block text-center clr-b2 mb-1 fs-14">
                                    <span>15000</span>
                                    <span class="unitmoney">
										تومان
									</span>
                                </del>
                                <ins  class="d-block text-center clr-red fs-14">
                                    <span>13000</span>
                                    <span class="unitmoney">
										تومان
									</span>
                                </ins>
                            </div>
                            <div class="add-to-cart-product position-absolute">
                                <a class="add-to-cart-link clr-ff bg-green rounded-circle" href="#">
                                    <i class="fal fa-shopping-cart clr-ff"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content-product">
                            <div class="img-product">
                                <a href="#"><img src="{{ asset('assets/images/front/accessory/04.png') }}" alt=""></a>
                            </div>
                            <div class="title-product px-2">
                                <a href="#">
                                    <h3 class="iransans fs-16 clr-42 text-center">کیف مردانه بته چقه ای</h3>
                                    <h4 class="iransans fs-12 clr-61 text-center">کد 235126</h4>
                                </a>
                            </div>
                            <div class="badge-product">
                                <span class="percentage fs-14 bg-red">20 %</span>
                            </div>
                            <div class="wishlist-product">
                                <a href="#">
                                    <span class="wishlist fs-14 clr-75 text-right">دوسش دارم</span>
                                    <i class="fal fa-heart clr-red fs-20"></i>
                                </a>
                            </div>
                            <div class="price-product px-2">
                                <del class="d-block text-center clr-b2 mb-1 fs-14">
                                    <span>15000</span>
                                    <span class="unitmoney">
										تومان
									</span>
                                </del>
                                <ins  class="d-block text-center clr-red fs-14">
                                    <span>13000</span>
                                    <span class="unitmoney">
										تومان
									</span>
                                </ins>
                            </div>
                            <div class="add-to-cart-product position-absolute">
                                <a class="add-to-cart-link clr-ff bg-green rounded-circle" href="#">
                                    <i class="fal fa-shopping-cart clr-ff"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- most purchased products section -->
<section class="container-fluid row-product px-4 pb-5">
    <div class=" container">
        <div class="row">
            <div class="col-12 title-products p-0">
                <div class="row align-items-end">
                    <div class="col-7 col-lg-9 col-xl-10 text-right">
                        <h3 class="pro-title fs-18 iransans header-gradient text-center d-inline-block px-4 mb-0 pb-2">پرفروش ترین محصولات</h3>
                    </div>
                    <div class="col-5 col-lg-3 col-xl-2">
                        <button class="btn btn-round btn-title dastnevis fs-18 bg-ff btn-outline-secondary py-2 m-0">مشاهده همه</button>
                    </div>
                </div>
                <hr class="under-title">
            </div>
        </div>
        <div class="row">
            <div class="col-12 row-products px-0">
                <div class="owl-carousel products owl-theme">
                    <div class="item">
                        <div class="content-product">
                            <div class="img-product">
                                <a href="#"><img src="{{ asset('assets/images/front/accessory/04.png') }}" alt=""></a>
                            </div>
                            <div class="title-product px-2">
                                <a href="#">
                                    <h3 class="iransans fs-16 clr-42 text-center">کیف مردانه بته چقه ای</h3>
                                    <h4 class="iransans fs-12 clr-61 text-center">کد 235126</h4>
                                </a>
                            </div>
                            <div class="badge-product">
                                <span class="percentage fs-14 bg-red">20 %</span>
                            </div>
                            <div class="wishlist-product">
                                <a href="#">
                                    <span class="wishlist fs-14 clr-75 text-right">دوسش دارم</span>
                                    <i class="fal fa-heart clr-red fs-20"></i>
                                </a>
                            </div>
                            <div class="price-product px-2">
                                <del class="d-block text-center clr-b2 mb-1 fs-14">
                                    <span>15000</span>
                                    <span class="unitmoney">
										تومان
									</span>
                                </del>
                                <ins  class="d-block text-center clr-red fs-14">
                                    <span>13000</span>
                                    <span class="unitmoney">
										تومان
									</span>
                                </ins>
                            </div>
                            <div class="add-to-cart-product position-absolute">
                                <a class="add-to-cart-link clr-ff bg-green rounded-circle" href="#">
                                    <i class="fal fa-shopping-cart clr-ff"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content-product">
                            <div class="img-product">
                                <a href="#"><img src="{{ asset('assets/images/front/accessory/04.png') }}" alt=""></a>
                            </div>
                            <div class="title-product px-2">
                                <a href="#">
                                    <h3 class="iransans fs-16 clr-42 text-center">کیف مردانه بته چقه ای</h3>
                                    <h4 class="iransans fs-12 clr-61 text-center">کد 235126</h4>
                                </a>
                            </div>
                            <div class="badge-product">
                                <span class="percentage fs-14 bg-red">20 %</span>
                            </div>
                            <div class="wishlist-product">
                                <a href="#">
                                    <span class="wishlist fs-14 clr-75 text-right">دوسش دارم</span>
                                    <i class="fal fa-heart clr-red fs-20"></i>
                                </a>
                            </div>
                            <div class="price-product px-2">
                                <del class="d-block text-center clr-b2 mb-1 fs-14">
                                    <span>15000</span>
                                    <span class="unitmoney">
										تومان
									</span>
                                </del>
                                <ins  class="d-block text-center clr-red fs-14">
                                    <span>13000</span>
                                    <span class="unitmoney">
										تومان
									</span>
                                </ins>
                            </div>
                            <div class="add-to-cart-product position-absolute">
                                <a class="add-to-cart-link clr-ff bg-green rounded-circle" href="#">
                                    <i class="fal fa-shopping-cart clr-ff"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content-product">
                            <div class="img-product">
                                <a href="#"><img src="{{ asset('assets/images/front/accessory/04.png') }}" alt=""></a>
                            </div>
                            <div class="title-product px-2">
                                <a href="#">
                                    <h3 class="iransans fs-16 clr-42 text-center">کیف مردانه بته چقه ای</h3>
                                    <h4 class="iransans fs-12 clr-61 text-center">کد 235126</h4>
                                </a>
                            </div>
                            <div class="badge-product">
                                <span class="percentage fs-14 bg-red">20 %</span>
                            </div>
                            <div class="wishlist-product">
                                <a href="#">
                                    <span class="wishlist fs-14 clr-75 text-right">دوسش دارم</span>
                                    <i class="fal fa-heart clr-red fs-20"></i>
                                </a>
                            </div>
                            <div class="price-product px-2">
                                <del class="d-block text-center clr-b2 mb-1 fs-14">
                                    <span>15000</span>
                                    <span class="unitmoney">
										تومان
									</span>
                                </del>
                                <ins  class="d-block text-center clr-red fs-14">
                                    <span>13000</span>
                                    <span class="unitmoney">
										تومان
									</span>
                                </ins>
                            </div>
                            <div class="add-to-cart-product position-absolute">
                                <a class="add-to-cart-link clr-ff bg-green rounded-circle" href="#">
                                    <i class="fal fa-shopping-cart clr-ff"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content-product">
                            <div class="img-product">
                                <a href="#"><img src="{{ asset('assets/images/front/accessory/04.png') }}" alt=""></a>
                            </div>
                            <div class="title-product px-2">
                                <a href="#">
                                    <h3 class="iransans fs-16 clr-42 text-center">کیف مردانه بته چقه ای</h3>
                                    <h4 class="iransans fs-12 clr-61 text-center">کد 235126</h4>
                                </a>
                            </div>
                            <div class="badge-product">
                                <span class="percentage fs-14 bg-red">20 %</span>
                            </div>
                            <div class="wishlist-product">
                                <a href="#">
                                    <span class="wishlist fs-14 clr-75 text-right">دوسش دارم</span>
                                    <i class="fal fa-heart clr-red fs-20"></i>
                                </a>
                            </div>
                            <div class="price-product px-2">
                                <del class="d-block text-center clr-b2 mb-1 fs-14">
                                    <span>15000</span>
                                    <span class="unitmoney">
										تومان
									</span>
                                </del>
                                <ins  class="d-block text-center clr-red fs-14">
                                    <span>13000</span>
                                    <span class="unitmoney">
										تومان
									</span>
                                </ins>
                            </div>
                            <div class="add-to-cart-product position-absolute">
                                <a class="add-to-cart-link clr-ff bg-green rounded-circle" href="#">
                                    <i class="fal fa-shopping-cart clr-ff"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- blog section -->
<section class="container-fluid row-blog bg-fa">
    <div class="container">
        <div class="row ">
            <div class="col-12 title-products p-0">
                <div class="row align-items-end">
                    <div class="col-7 col-lg-9 col-xl-10 text-right">
                        <h3 class="pro-title fs-18 iransans header-gradient text-center d-inline-block px-4 mb-0 pb-2">مجله هنری هنرچی</h3>
                    </div>
                    <div class="col-5 col-lg-3 col-xl-2">
                        <button class="btn btn-round btn-title dastnevis fs-18 bg-ff btn-outline-secondary py-2 m-0">مشاهده وبلاگ</button>
                    </div>
                </div>
                <hr class="under-title">
            </div>
        </div>
        <div class="row row-blog">
            <div class="d-none d-lg-block col-lg-4">
                <div class="content-blog bx-sh bg-ff">
                    <div class="date-blog position-absolute fs-12 clr-ff">
                        <span>24 اسفند 97</span>
                    </div>
                    <div class="img-blog bg-42">
                        <a href="#">
                            <img src="{{ asset('assets/images/front/accessory/blog01.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="title-blog">
                        <a href="#">
                            <h3 class="text-right dastnevis px-3 fs-20 clr-61">خاکی که کیمیا شد</h3>
                        </a>
                    </div>
                    <div class="title-blog">
                        <p class="short-des text-right fs-12 px-3 pb-2">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                    </div>
                    <div class="more-btn text-center">
                        <button class="btn btn-secondary btn-round dastnevis fs-16 py-2">ادامه مطلب</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="content-blog bx-sh bg-ff">
                    <div class="date-blog position-absolute fs-12 clr-ff">
                        <span>24 اسفند 97</span>
                    </div>
                    <div class="img-blog bg-42">
                        <a href="#">
                            <img src="{{ asset('assets/images/front/accessory/blog01.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="title-blog">
                        <a href="#">
                            <h3 class="text-right dastnevis px-3 fs-20 clr-61">خاکی که کیمیا شد</h3>
                        </a>
                    </div>
                    <div class="description-blog">
                        <p class="short-des text-right fs-12 px-3 pb-2">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                    </div>
                    <div class="more-btn text-center">
                        <button class="btn btn-secondary btn-round dastnevis fs-16 py-2">ادامه مطلب</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="content-blog bx-sh bg-ff">
                    <div class="date-blog position-absolute fs-12 clr-ff">
                        <span>24 اسفند 97</span>
                    </div>
                    <div class="img-blog bg-42">
                        <a href="#">
                            <img src="{{ asset('assets/images/front/accessory/blog01.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="title-blog">
                        <a href="#">
                            <h3 class="text-right dastnevis px-3 fs-20 clr-61">خاکی که کیمیا شد</h3>
                        </a>
                    </div>
                    <div class="title-blog">
                        <p class="short-des text-right fs-12 px-3 pb-2">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                    </div>
                    <div class="more-btn text-center">
                        <button class="btn btn-secondary btn-round dastnevis fs-16 py-2">ادامه مطلب</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- comment section -->
<section class="container-fluid row-comment py-5">
    <div class="container">
        <h3 class="text-center header-gradient fs-25 dastnevis mb-2">آخرین نظرات کاربران</h3>
        <div class="row row-comment">
            <div class="col-12">
                <div class="owl-carousel comments owl-theme mt-5">
                    <div class="item">
                        <div class="content-comment p-3">
                            <div class="text-comment">
                                <p class="crl-61 fs-12 text-right">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                            </div>
                            <div class="name1-comment">
                                <p class="text-center clr-42 dastnevis">نصیحت کننده عاقل</p>
                            </div>
                            <div class="img-comment ">
                                <img class="mx-auto bx-sh" src="{{ asset('assets/images/front/accessory/04.png') }}" alt="">
                            </div>
                            <div class="name2-comment">
                                <h3 class="text-center clr-gold dastnevis fs-18">نصیحت کننده عاقل</h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content-comment p-3">
                            <div class="text-comment">
                                <p class="crl-61 fs-12 text-right">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                            </div>
                            <div class="name1-comment">
                                <p class="text-center clr-42 dastnevis">نصیحت کننده عاقل</p>
                            </div>
                            <div class="img-comment ">
                                <img class="mx-auto bx-sh" src="{{ asset('assets/images/front/accessory/04.png') }}" alt="">
                            </div>
                            <div class="name2-comment">
                                <h3 class="text-center clr-gold dastnevis fs-18">نصیحت کننده عاقل</h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content-comment p-3">
                            <div class="text-comment">
                                <p class="crl-61 fs-12 text-right">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                            </div>
                            <div class="name1-comment">
                                <p class="text-center clr-42 dastnevis">نصیحت کننده عاقل</p>
                            </div>
                            <div class="img-comment ">
                                <img class="mx-auto bx-sh" src="{{ asset('assets/images/front/accessory/04.png') }}" alt="">
                            </div>
                            <div class="name2-comment">
                                <h3 class="text-center clr-gold dastnevis fs-18">نصیحت کننده عاقل</h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content-comment p-3">
                            <div class="text-comment">
                                <p class="crl-61 fs-12 text-right">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                            </div>
                            <div class="name1-comment">
                                <p class="text-center clr-42 dastnevis">نصیحت کننده عاقل</p>
                            </div>
                            <div class="img-comment ">
                                <img class="mx-auto bx-sh" src="{{ asset('assets/images/front/accessory/04.png') }}" alt="">
                            </div>
                            <div class="name2-comment">
                                <h3 class="text-center clr-gold dastnevis fs-18">نصیحت کننده عاقل</h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content-comment p-3">
                            <div class="text-comment">
                                <p class="crl-61 fs-12 text-right">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                            </div>
                            <div class="name1-comment">
                                <p class="text-center clr-42 dastnevis">نصیحت کننده عاقل</p>
                            </div>
                            <div class="img-comment ">
                                <img class="mx-auto bx-sh" src="{{ asset('assets/images/front/accessory/04.png') }}" alt="">
                            </div>
                            <div class="name2-comment">
                                <h3 class="text-center clr-gold dastnevis fs-18">نصیحت کننده عاقل</h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content-comment p-3">
                            <div class="text-comment">
                                <p class="crl-61 fs-12 text-right">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                            </div>
                            <div class="name1-comment">
                                <p class="text-center clr-42 dastnevis">نصیحت کننده عاقل</p>
                            </div>
                            <div class="img-comment ">
                                <img class="mx-auto bx-sh" src="{{ asset('assets/images/front/accessory/04.png') }}" alt="">
                            </div>
                            <div class="name2-comment">
                                <h3 class="text-center clr-gold dastnevis fs-18">نصیحت کننده عاقل</h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- gallery section -->
<section class="container-fluid row-gallery pt-2 pb-5">
    <div class="container">
        <h3 class="text-center header-gradient fs-25 dastnevis mb-2">لیست گالری ها</h3>
        <div class="row row-galleries">
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="content-gallery bg-ff bx-sh position-relative">
                    <div class="inner-content-gallery">
                        <div class="img-gallery">
                            <a href="#">
                                <img src="{{ asset('assets/images/front/accessory/hashimian.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="inner-gallery pr-3 position-absolute">
                            <div class="name-gallery text-right">
                                <a href="#">
                                    <h3 class="dastnevis clr-ff fs-18">ریحانه هاشمیان</h3>
                                </a>
                            </div>
                            <div class="rate-gallery text-right">
                                <i class="fal fa-star clr-f5"></i>
                                <i class="fal fa-star clr-f5"></i>
                                <i class="fal fa-star clr-yellow"></i>
                                <i class="fal fa-star clr-yellow"></i>
                                <i class="fal fa-star clr-yellow"></i>
                            </div>
                            <div class="location-gallery text-right">
                                <p class="dastnevis clr-ff">خراسان جنوبی - نوفرست</p>
                            </div>
                        </div>
                    </div>
                    <div class="thumnail-shop position-absolute">
                        <a href="#">
                            <img class="bx-sh" src="{{ asset('assets/images/front/accessory/shop-auther.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="about-shopping text-center position-relative">
                        <button class="btn btn-secondary btn-round dastnevis fs-16 py-2  my-2 te-sh">نمایش فروشگاه</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="content-gallery bg-ff bx-sh position-relative">
                    <div class="inner-content-gallery">
                        <div class="img-gallery">
                            <a href="#">
                                <img src="{{ asset('assets/images/front/accessory/hashimian.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="inner-gallery pr-3 position-absolute">
                            <div class="name-gallery text-right">
                                <a href="#">
                                    <h3 class="dastnevis clr-ff fs-18">ریحانه هاشمیان</h3>
                                </a>
                            </div>
                            <div class="rate-gallery text-right">
                                <i class="fal fa-star clr-f5"></i>
                                <i class="fal fa-star clr-f5"></i>
                                <i class="fal fa-star clr-yellow"></i>
                                <i class="fal fa-star clr-yellow"></i>
                                <i class="fal fa-star clr-yellow"></i>
                            </div>
                            <div class="location-gallery text-right">
                                <p class="dastnevis clr-ff">خراسان جنوبی - نوفرست</p>
                            </div>
                        </div>
                    </div>
                    <div class="thumnail-shop position-absolute">
                        <a href="#">
                            <img class="bx-sh" src="{{ asset('assets/images/front/accessory/shop-auther.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="about-shopping text-center position-relative">
                        <button class="btn btn-secondary btn-round dastnevis fs-16 py-2  my-2 te-sh">نمایش فروشگاه</button>
                    </div>
                </div>
            </div>
            <div class="d-none d-lg-block col-lg-4 mb-4">
                <div class="content-gallery bg-ff bx-sh position-relative">
                    <div class="inner-content-gallery">
                        <div class="img-gallery">
                            <a href="#">
                                <img src="{{ asset('assets/images/front/accessory/hashimian.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="inner-gallery pr-3 position-absolute">
                            <div class="name-gallery text-right">
                                <a href="#">
                                    <h3 class="dastnevis clr-ff fs-18">ریحانه هاشمیان</h3>
                                </a>
                            </div>
                            <div class="rate-gallery text-right">
                                <i class="fal fa-star clr-f5"></i>
                                <i class="fal fa-star clr-f5"></i>
                                <i class="fal fa-star clr-yellow"></i>
                                <i class="fal fa-star clr-yellow"></i>
                                <i class="fal fa-star clr-yellow"></i>
                            </div>
                            <div class="location-gallery text-right">
                                <p class="dastnevis clr-ff">خراسان جنوبی - نوفرست</p>
                            </div>
                        </div>
                    </div>
                    <div class="thumnail-shop position-absolute">
                        <a href="#">
                            <img class="bx-sh" src="{{ asset('assets/images/front/accessory/shop-auther.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="about-shopping text-center position-relative">
                        <button class="btn btn-secondary btn-round dastnevis fs-16 py-2  my-2 te-sh">نمایش فروشگاه</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-btn text-center">
            <div class="col-12">
                <button class="btn btn-danger btn-round btn-circle position-relative fs-16 dastnevis">
                    <i class="fal fa-store clr-red fs-20 position-relative"></i>
                    مشاهده همه گالری ها
                </button>
            </div>
        </div>
    </div>
</section>

<!-- footer section -->
<div class="top-footer text-center">
    <img src="{{ asset('assets/images/front/footer.svg') }}" alt="">
</div>

<footer class="container-fluid row-footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-4 order-1 order-lg-1">
                <div class="title-products">
                    <h3 class="pro-title fs-18 dastnevis header-gradient text-center d-inline-block px-3 px-md-5 mb-0">دسترسی سریع</h3>
                    <hr class="under-title">
                </div>
                <div class="content-footer p-3 pt-4 bg-ff bx-sh text-right">
                    <ul class="footer-menu">
                        <li class="d-block">
                            <a href="#">همکاری با هنرچی</a>
                        </li>
                        <li class="d-block">
                            <a href="#">درباره هنرچی</a>
                        </li>
                        <li class="d-block">
                            <a href="#">تماس با ما</a>
                        </li>
                        <li class="d-block">
                            <a href="#">سوالات متداول</a>
                        </li>
                        <li class="d-block">
                            <a href="#">قوانین و مقررات</a>
                        </li>
                        <li class="d-block">
                            <a href="#">لیست گالری ها</a>
                        </li>
                        <li class="d-block">
                            <a href="#">وبلاگ</a>
                        </li>
                        <li class="d-block">
                            <a href="#">ثبت شکایات</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-4 order-3 order-lg-2 mt-5">
                <div class="title-products">
                    <h3 class="pro-title fs-18 dastnevis header-gradient text-center d-inline-block px-3 px-md-5 mb-0">عضویت در خبرنامه</h3>
                    <hr class="under-title">
                </div>
                <div class="content-footer-1 text-right">
                    <div class="form-group bmd-form-group news">
                        <input type="email" class="form-control bg-input" placeholder="sample@gmail.com">
                    </div>
                </div>
                <button class="btn btn-info btn-round btn-circle circle-1 position-relative fs-16 dastnevis py-2">
                    <i class="fal fa-paper-plane clr-info fs-20 position-relative"></i>
                    عضویت در خبرنامه
                </button>
                <div class="area-logoes text-center mt-4 p-3 bx-sh">
                    <a href="#"><img class="d-inline-block" src="{{ asset('assets/images/front/accessory/namad01.png') }}" alt=""></a>
                    <a href="#"><img class="d-inline-block" src="{{ asset('assets/images/front/accessory/namad02.png') }}" alt=""></a>
                    <a href="#"><img class="d-inline-block" src="{{ asset('assets/images/front/accessory/namad03.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 order-2 order-lg-3">
                <div class="title-products">
                    <h3 class="pro-title fs-18 dastnevis header-gradient text-center d-inline-block px-3 px-md-5 mb-0">تماس با ما</h3>
                    <hr class="under-title">
                </div>
                <div class="content-footer p-3 pt-4 bg-ff bx-sh text-right">
                    <div class="contact-us py-2">
                        <i class="fal fa-map-marker-alt fs-25 clr-blue2 ml-2"></i>
                        <span class="fs-14">تهران، اقدسیه، میدان ازگل، کوچه نوبهار</span>
                    </div>
                    <div class="contact-us py-2">
                        <i class="fal fa-mobile-alt fs-25 clr-blue2 ml-2"></i>
                        <span class="fs-14">09120760113</span>
                    </div>
                    <div class="contact-us py-2">
                        <i class="fal fa-phone-office fs-25 clr-blue2 ml-2"></i>
                        <span class="fs-14">056 32210006</span>
                    </div>
                    <div class="contact-us py-2">
                        <i class="fal fa-envelope fs-25 clr-blue2 ml-2"></i>
                        <span class="fs-14">info@viranika.com</span>
                    </div>
                    <div class="social-network text-center">
                        <div class="area-so d-inline-block bg-ff">
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                        <div class="area-so d-inline-block bg-ff">
                            <a href="#">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                        </div>
                        <div class="area-so d-inline-block bg-ff">
                            <a href="#">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                        <div class="area-so d-inline-block bg-ff">
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                        <div class="area-so d-inline-block bg-ff">
                            <a href="#">
                                <i class="fal fa-paper-plane"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<section class="container-fluid copyright py-4 bg-cc">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-right">
                <p class="m-0 mt-1 dastnevis fs-16">تمامی حقوق کپی رایت نزد سایت
                    <a class="clr-42" href="#">هنرچی</a>
                    محفوظ است.
                </p>
            </div>
            <div class="col-lg-6 text-center text-lg-left mt-3 mt-lg-0">
                <p class="d-inline-block m-0 dastnevis fs-16">طراحی و توسعه توسط تجارت نوین</p>
                <a href="#"><img src="http://viranika.com/wp-content/uploads/2018/11/logo-w.svg" alt=""></a>
            </div>
        </div>
    </div>
</section>

<!-- scripts -->
<script type="text/javascript" src="{{ asset('js/front/jquery-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/front/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/front/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/front/bootstrap-material-design.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/front/material-kit.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/front/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/front/nouislider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/front/jasny-bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/front/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/front/custom.js') }}"></script>
<!-- End scripts -->
</body>
</html>