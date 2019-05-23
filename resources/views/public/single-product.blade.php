@extends('public.layouts.master')

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/lightgallery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/justifiedGallery.min.css') }}">
@endsection

@section('content')
    <pre>
        {{$product}}
    </pre>
    <!-- Start SingleProduct -->
    <section class="body SingleProduct">
        <section class="container-fluid breadcrumb-product">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-right">
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb bg-fd dastnevis">
                                @php
                                    $breadcrumb = [$product->categories[0]];
                                    $temp = $product->categories[0];
                                    while ($temp->hasParent()):
                                        $breadcrumb[] = $temp->parent;
                                        $temp = $temp->parent;
                                    endwhile;
                                @endphp

                                <li class="breadcrumb-item"><a class="clr-61" href="/">صفحه اصلی</a></li>
                                <li class="breadcrumb-item"><a class="clr-61" href="#">فروشگاه</a></li>

                                @for($i = sizeof($breadcrumb) - 1; $i >= 0; $i--)
                                    <li class="breadcrumb-item"><a class="clr-61" href="categories/{{ $breadcrumb[$i]->slug }}">{{ $breadcrumb[$i]->name }}</a></li>
                                @endfor
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid main-product pb-5">
            <div class="container">
                <div class="row content-main-product bg-ff bx-sh">
                    <div class="col-12 col-lg-6">
                        <div class="socials sticky-top">
                            <ul class="share-menu position-absolute">
                                <li class="main-share">
                                    <a href="#">
									<span>
										<i class="fal fa-share-alt fs-25 clr-92"></i>
									</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#">
											<span>
												<i class="fab fa-telegram-plane fs-25 clr-92"></i>
											</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
											<span>
												<i class="fab fa-twitter fs-25 clr-92"></i>
											</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
											<span>
												<i class="fab fa-instagram fs-25 clr-92"></i>
											</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
											<span>
												<i class="fab fa-linkedin-in fs-25 clr-92"></i>
											</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
											<span>
												<i class="fab fa-google-plus-g fs-25 clr-92"></i>
											</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="product-gallery p-3">
                            <div class="pgm-img bx-sh p-2 mb-3">
                                <img src="/assets/images/front/accessory/blog01.jpg" alt="هنرچی" />
                            </div>
                            <div class="pgt-img">
                                <div id="aniimated-thumbnials">
                                    <a href="/assets/images/front/accessory/blog01.jpg">
                                        <img src="/assets/images/front/accessory/blog01.jpg" />
                                    </a>
                                    <a href="/assets/images/front/accessory/blog01.jpg">
                                        <img src="/assets/images/front/accessory/blog01.jpg" />
                                    </a>
                                    <a href="/assets/images/front/accessory/blog01.jpg">
                                        <img src="/assets/images/front/accessory/blog01.jpg" />
                                    </a>
                                    <a href="/assets/images/front/accessory/blog01.jpg">
                                        <img src="/assets/images/front/accessory/blog01.jpg" />
                                    </a>
                                    <a href="/assets/images/front/accessory/blog01.jpg">
                                        <img src="/assets/images/front/accessory/blog01.jpg" />
                                    </a>
                                    <a href="/assets/images/front/accessory/blog01.jpg">
                                        <img src="/assets/images/front/accessory/blog01.jpg" />
                                    </a>
                                    <a href="/assets/images/front/accessory/blog01.jpg">
                                        <img src="/assets/images/front/accessory/blog01.jpg" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 text-right position-relative">
                        <div class="bg-svg-article position-absolute">
                            <svg version="1.1" id="Isolation_Mode" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                 y="0px" viewBox="0 0 233 96" style="enable-background:new 0 0 233 96;" xml:space="preserve">
										<g style="opacity:0.41;">
                                            <path style="fill:#EAEAEA;" d="M172.8,0c-6.2-0.2-17.8-1.2-22.5,2.9c-17.2,14.7-24,38.7-40.3,54.4C93.7,72.9,71,81,48.3,82.1
								C25.7,83.2,5.4,71.9,0,67.3L-0.2,0H172.8z"/>
                                            <g>
                                                <path style="fill:#DBDBDB;" d="M218.8,0.4h-219v63c3.6-10.8,10-21.1,21-29.2c20-14.6,52.5-15.1,79.7-13.3c31.2,2,58.4,18.7,88.3,11.5c19.2-4.6,31.3-21.5,30-31.8C218.8,0.5,218.9,0.4,218.8,0.4z"/>
                                            </g>
                                        </g>
						</svg>
                        </div>
                        <div class="badge-sty2">
                            <span class="percentage fs-14">20 %</span>
                            <span class="lable-percentage">تخفیف</span>
                        </div>
                        <div class="title-product">
                            <h1 class="dastnevis header-gradient fs-20 p-2">{{ $product->name }}</h1>
                        </div>
                        <div class="price-single">
                            <h4 class="d-inline-block iransans fs-16">قیمت محصول :</h4>
                            <del class="text-center clr-b2 mb-1 fs-14">
                                <span>15000</span>
                                <span class="unitmoney">
								تومان
							</span>
                            </del>
                            <ins  class="text-center clr-red fs-14">
                                <span>13000</span>
                                <span class="unitmoney">
								تومان
							</span>
                            </ins>
                        </div>
                        <div class="price-wholesale">
                            <h4 class="d-inline-block iransans fs-16">قیمت عمده محصول :</h4>
                            <del class="text-center clr-b2 mb-1 fs-14">
                                <span>15000</span>
                                <span class="unitmoney">
								تومان
							</span>
                            </del>
                            <ins  class="text-center clr-red fs-14">
                                <span>13000</span>
                                <span class="unitmoney">
								تومان
							</span>
                            </ins>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">حالت محصول مورد نظر خود را انتخاب کنید</label>
                                <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1">
                                    <option>رنگ آبی - سایز بزرگ</option>
                                    <option>رنگ آبی - سایز متوسط</option>
                                    <option>رنگ بنفش سایز کوچک</option>
                                    <option>رنگ خاکستری سایز بزرگ</option>
                                    <option>رنگ خاکستری سایز کوچک</option>
                                </select>
                            </div>
                            <div class="addtocart-area position-relative">
                                <div class="qty position-absolute">
                                    <span class="minus bg-dd">-</span>
                                    <input type="number" class="count clr-75" name="qty" value="1">
                                    <span class="plus bg-dd">+</span>
                                </div>
                                <button class="position-absolute btn btn-success bg-green btn-round btn-circle circle-1 dastnevis fs-16">
                                    <i class="fal fa-cart-plus clr-green fs-20 position-relative"></i>
                                    افزودن به سبد خرید
                                </button>
                            </div>
                            <div class="space-height">
                            </div>
                            <div class="storage my-3 text-right clr-red">
                                <span>ناموجود</span>
                            </div>
                            <div class="modal-buy">
                                <!-- Button trigger modal -->
                                <button type="button" class="position-relative btn btn-default bg-green btn-round btn-circle circle-1 dastnevis fs-16"  data-toggle="modal" data-target="#buy">
                                    <i class="fal fa-shopping-bag clr-75 fs-20 position-relative"></i>
                                    قصد پیش خرید محصول را دارم
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="buy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title dastnevis clr-blue2" id="m-title">پیش خرید</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>این محصول اکنون در انبار موجود نیست </p>
                                                <p>اما امکان سفارش این محصول میباشد تا هنرمند هنرچی برایتان آماده کند</p>
                                                <p>مدت زمان آماده شدن محصول از
                                                    <span class="clr-red">15</span>
                                                    روز تا
                                                    <span class="clr-red">30</span>
                                                    روز می باشد
                                                </p>
                                                <div class="addtocart-area popup position-relative">
                                                    <div class="qty d-inline">
                                                        <span class="minus bg-dd">-</span>
                                                        <input type="number" class="count clr-75" name="qty" value="1">
                                                        <span class="plus bg-dd">+</span>
                                                    </div>
                                                    <button class=" btn btn-success bg-green btn-round btn-circle circle-1 dastnevis fs-16">
                                                        <i class="fal fa-cart-plus clr-green fs-20 position-relative"></i>
                                                        افزودن به سبد خرید
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="meta-product mt-3">
                                <div class="content-meta category">
                                    <i class="fal fa-folder-open"></i>
                                    <span class="dastnevis clr-blue2">دسته ها :</span>
                                    <a class="dastnevis clr-61" href="#">تزئین</a>
                                    <span>،</span>
                                    <a class="dastnevis clr-61" href="#">دکور وتزئینات</a>
                                    <span>،</span>
                                    <a class="dastnevis clr-61" href="#">تزئین</a>
                                    <span>،</span>
                                    <a class="dastnevis clr-61" href="#">دکور وتزئینات</a>
                                </div>
                                <div class="content-meta brand">
                                    <i class="fal fa-signature"></i>
                                    <span class="dastnevis clr-blue2">نام برند / هنرمند :</span>
                                    <a class="dastnevis clr-61" href="#">{{ $product->gallery->gallery_name }}</a>
                                </div>
                                <div class="content-meta attentions">
                                    <i class="fal fa-exclamation-triangle clr-red"></i>
                                    <p class="dastnevis d-inline-block">به ازای خرید هر
                                        <span class="clr-red">12 عدد</span>
                                        قیمت یه صورت عمده برایتان محصوب می شود.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid tabs-prouct">
            <div class="container">
                <div class="row">
                    <div class="col-12 p-0">
                        <ul class="nav nav-pills nav-pills-icons p-0" role="tablist">
                            <!--
                                    color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                            -->
                            <li class="nav-item">
                                <a class="nav-link active" href="#description" role="tab" data-toggle="tab">
                                    <i class="fal fa-books"></i>
                                    توضیحات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#feature" role="tab" data-toggle="tab">
                                    <i class="fal fa-swatchbook"></i>
                                    مشخصات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#commentId" role="tab" data-toggle="tab">
                                    <i class="fal fa-comments-alt"></i>
                                    دیدگاه ها
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content tab-space mt-1">
                            <div class="tab-pane bg-ff active text-right bx-sh p-3" id="description">
                                {!! $product->description !!}
                            </div>
                            <div class="tab-pane bg-ff bx-sh p-3 iransans fs-14" id="feature">
                                <h3 class="dastnevis text-right ">
                                    مشخصات کلی
                                </h3>
                                <ul>
                                    <li class="row text-right mt-1">
                                        <div class="col-3 pl-1">
                                            <div class="bg-ee px-2 py-3">
                                                <span>عنوان ویژگی اول</span>
                                            </div>
                                        </div>
                                        <div class="col-9 pr-0">
                                            <div class="bg-f5 px-2 py-3">
                                                <span>زیبا و جادار</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="row text-right mt-1">
                                        <div class="col-3 pl-1">
                                            <div class="bg-ee px-2 py-3">
                                                <span>عنوان ویژگی اول</span>
                                            </div>
                                        </div>
                                        <div class="col-9 pr-0">
                                            <div class="bg-f5 px-2 py-3">
                                                <span>زیبا و جادار</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="row text-right mt-1">
                                        <div class="col-3 pl-1">
                                            <div class="bg-ee px-2 py-3">
                                                <span>عنوان ویژگی اول</span>
                                            </div>
                                        </div>
                                        <div class="col-9 pr-0">
                                            <div class="bg-f5 px-2 py-3">
                                                <span>زیبا و جادار</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="row text-right mt-1">
                                        <div class="col-3 pl-1">
                                            <div class="bg-ee px-2 py-3">
                                                <span>عنوان ویژگی اول</span>
                                            </div>
                                        </div>
                                        <div class="col-9 pr-0">
                                            <div class="bg-f5 px-2 py-3">
                                                <span>زیبا و جادار</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="row text-right mt-1">
                                        <div class="col-3 pl-1">
                                            <div class="bg-ee px-2 py-3">
                                                <span>عنوان ویژگی اول</span>
                                            </div>
                                        </div>
                                        <div class="col-9 pr-0">
                                            <div class="bg-f5 px-2 py-3">
                                                <span>زیبا و جادار</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <h3 class="dastnevis text-right ">
                                    سایر مشخصات
                                </h3>
                                <ul>
                                    <li class="row text-right mt-1">
                                        <div class="col-3 pl-1">
                                            <div class="bg-ee px-2 py-3">
                                                <span>عنوان ویژگی اول</span>
                                            </div>
                                        </div>
                                        <div class="col-9 pr-0">
                                            <div class="bg-f5 px-2 py-3">
                                                <span>زیبا و جادار</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="row text-right mt-1">
                                        <div class="col-3 pl-1">
                                            <div class="bg-ee px-2 py-3">
                                                <span>عنوان ویژگی اول</span>
                                            </div>
                                        </div>
                                        <div class="col-9 pr-0">
                                            <div class="bg-f5 px-2 py-3">
                                                <span>زیبا و جادار</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="row text-right mt-1">
                                        <div class="col-3 pl-1">
                                            <div class="bg-ee px-2 py-3">
                                                <span>عنوان ویژگی اول</span>
                                            </div>
                                        </div>
                                        <div class="col-9 pr-0">
                                            <div class="bg-f5 px-2 py-3">
                                                <span>زیبا و جادار</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="row text-right mt-1">
                                        <div class="col-3 pl-1">
                                            <div class="bg-ee px-2 py-3">
                                                <span>عنوان ویژگی اول</span>
                                            </div>
                                        </div>
                                        <div class="col-9 pr-0">
                                            <div class="bg-f5 px-2 py-3">
                                                <span>زیبا و جادار</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="row text-right mt-1">
                                        <div class="col-3 pl-1">
                                            <div class="bg-ee px-2 py-3">
                                                <span>عنوان ویژگی اول</span>
                                            </div>
                                        </div>
                                        <div class="col-9 pr-0">
                                            <div class="bg-f5 px-2 py-3 mb-1">
                                                <span>زیبا و جادار</span>
                                            </div>
                                            <div class="bg-f5 px-2 py-3 mb-1">
                                                <span>زیبا و جادار</span>
                                            </div>
                                            <div class="bg-f5 px-2 py-3 mb-1">
                                                <span>زیبا و جادار</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane bg-ff bx-sh p-3" id="commentId">
                                <div class="row">
                                    <div class="col-12 col-md-6 review-input">
                                        <div class="form-group bmd-form-group text-right">
                                            <label class="bmd-label-floating mr-2">نام و نام خانوادگی</label>
                                            <input type="text" class="form-control position-relative ">
                                        </div>
                                        <div class="form-group bmd-form-group text-right">
                                            <label class="bmd-label-floating mr-2">پست الکترونیک</label>
                                            <input type="email" class="form-control position-relative ">
                                        </div>
                                        <div class="form-group bmd-form-group text-right">
                                            <label class="bmd-label-floating mr-2">متن دیدگاه</label>
                                            <textarea class="form-control position-relative " rows="8"></textarea>
                                        </div>
                                        <div class="btn-review text-center">
                                            <button class="btn btn-secondary btn-round dastnevis btn-circle position-relative fs-16">
                                                <i class="fal fa-comment-smile clr-gold fs-20 position-relative"></i>
                                                ارسال دیدگاه
                                            </button>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block col-md-6 review-img text-center">
                                        <div class="svg-img mx-auto">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 500 500" style="enable-background:new 0 0 500 500;" xml:space="preserve">
												<g id="OBJECTS">
                                                    <g>
                                                        <path style="fill:#2874A6;" d="M340.1,75.2H154.9c-25.9,0-46.9,21-46.9,46.9v96.3c0,25.9,21,46.9,46.9,46.9h143.3
															c0.9,3.6-0.6,9.3-10.7,18c-19.8,17.2,13.2,14.1,18.5,11.4c5-2.5,26.6-13.7,27-29.5h7.1c25.9,0,46.9-21,46.9-46.9v-96.3
															C387,96.2,366,75.2,340.1,75.2z"/>
                                                        <g>
                                                            <path style="fill:#95B9FC;" d="M46.7,74.2h74.8c0,0,10-2,0-9.5s-3-11-12-17s-16-2-21.5,3.5s-14.5-5-22.5,0.5s-3.5,7.5-10.5,10.5
																c-5.5,2.3-12.4,2.9-12.9,7.2C41.9,72,44.1,74.2,46.7,74.2z"/>
                                                            <path style="fill:#95B9FC;" d="M391.6,166h74.2c0.5,0,0.9-0.1,1.4-0.2c2.2-0.7,7.5-3.2-0.8-9.3c-8-5.8-4.3-9.5-12.7-13.3
																c-9.8-4.5-13.7,4-21.3,5.7c-9.3,2.1-14.7-15.2-22.7-9.7s-2.8,11.8-9.8,14.8c-5.4,2.3-12.4,2.9-12.9,7.2
																C386.7,163.8,389,166,391.6,166z"/>
                                                            <path style="fill:#95B9FC;" d="M55.2,295.5h87.4c0.6,0,1.1-0.1,1.6-0.3c2.5-0.8,8.9-3.8-0.9-10.9c-9.4-6.9-5.1-11.2-14.9-15.7
																c-11.6-5.3-16.2,4.7-25.1,6.7c-11,2.4-17.3-17.9-26.7-11.4s-3.3,13.9-11.6,17.5c-6.4,2.7-14.6,3.4-15.2,8.5
																C49.5,292.9,52.1,295.5,55.2,295.5z"/>
                                                        </g>
                                                        <g>
                                                            <path style="fill:#95B9FC;" d="M226.7,378.4h-134c0,0-39.3-3.5-40,9.9C52,401.7,94,393,105,402.3c11,9.3-4.6,26,18.2,34
																c22.8,8,83.5,6.7,99.2,5.5c17.9-1.4,8.9-16.9,25.6-17.5c16.7-0.7,72.3-0.3,78.3-0.7c27-1.7,4.3-15.7,19.7-16.3
																c12.1-0.5,60.4-3.4,78.9-3.9c6.6-0.2,14.7-3.3,15.4-9.8c0.6-5.3-1.5-7.8-9.3-9.6C412.5,379.8,226.7,378.4,226.7,378.4z"/>
                                                            <g>
                                                                <ellipse style="fill:#A7BED1;" cx="129" cy="392.8" rx="37.3" ry="4.5"/>
                                                                <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="127.9129" y1="341.5951" x2="129.413" y2="391.5951">
                                                                    <stop  offset="0" style="stop-color:#1CC89F"/>
                                                                    <stop  offset="1" style="stop-color:#1BA581"/>
                                                                </linearGradient>
                                                                <path style="fill:url(#SVGID_1_);" d="M159.2,392.4h-56.7c0,0-7.7-9.6,0-17.2c7.7-7.7-3.7-22,0-29c3.7-7,20.3-14.7,30.7,0
																	c10.3,14.7-2,22.3,3,28.7C141.2,381.1,160.9,371.9,159.2,392.4z"/>
                                                            </g>
                                                            <g>
                                                                <ellipse style="fill:#A7BED1;" cx="329.9" cy="393.6" rx="42.8" ry="5.2"/>
                                                                <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="329.9483" y1="367.6667" x2="329.9483" y2="396.3333">
                                                                    <stop  offset="0" style="stop-color:#1CC89F"/>
                                                                    <stop  offset="1" style="stop-color:#1BA581"/>
                                                                </linearGradient>
                                                                <path style="fill:url(#SVGID_2_);" d="M297.3,393.2c1,0.8,64.7,0,64.7,0s3.7-24.4-7.7-27.3c-11.3-2.9-15.3,1.7-21,10.1
																	c-5.7,8.3-22.3-7-29.3,1S297.3,393.2,297.3,393.2z"/>
                                                            </g>
                                                            <g>
                                                                <ellipse style="fill:#A7BED1;" cx="396.8" cy="392.4" rx="20.3" ry="2.5"/>
                                                                <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="394.749" y1="324.2896" x2="396.749" y2="388.9562">
                                                                    <stop  offset="0" style="stop-color:#1CC89F"/>
                                                                    <stop  offset="1" style="stop-color:#1BA581"/>
                                                                </linearGradient>
                                                                <path style="fill:url(#SVGID_3_);" d="M385.2,392.4c0,0-4.3-6.7-2.7-14.7c1.7-8,6.7-8.7,5.3-14c-1.3-5.3-10.1-11.5-5.7-20.9
																	c4.4-9.4,7.5-8.8,5.9-15.1c-1.6-6.3-5.6-19,0.4-20c6-1,12,5.7,13.4,14.3c1.3,8.7-0.3,9,1.7,12.7c2,3.7,7,15.7,3.3,27.3
																	c-3.7,11.7,7.3,16.7,3.7,30.4H385.2z"/>
                                                            </g>
                                                            <g>
                                                                <ellipse style="fill:#A7BED1;" cx="226" cy="394.8" rx="42.8" ry="5.2"/>
                                                                <g>
                                                                    <polygon style="fill:#081A35;" points="226.7,378.4 221.3,375.4 226.6,372.2 231.9,375.4 					"/>
                                                                    <path style="fill:#0B2148;" d="M196,369.2c0,0-6.6,6,0,14.2c6.6,8.3,38,12.1,47.3,11.2c0,0,1.3-1.9,0.8-7.5
																		c0,0-5.4-1.5-8.8-3.4S203.2,362.2,196,369.2z"/>
                                                                    <path style="fill:#0A2C5C;" d="M257.4,369.2c0,0,6.6,6,0,14.2c-6.6,8.3-38,12.1-47.3,11.2c0,0-1.3-1.9-0.8-7.5
																		c0,0,5.4-1.5,8.8-3.4C221.6,381.7,250.2,362.2,257.4,369.2z"/>
                                                                    <path style="fill:#6557E3;" d="M219.9,323.3c0,0-15.2,2.7-23.9,16.6c0,0,0.5,8,6.8,11c0,0,1-4.5,6.8-7.2c0,0-3.4,8.4-0.9,23.9
																		c0,0,13.8,8.6,36.1,0c0,0,2.9-10.3,0-24.6c0,0,3.5,2.3,5.6,7.1c0,0,5.4-1.2,7.2-11.7c0,0-8.9-14.3-24.1-15.1H219.9z"/>
                                                                    <path style="fill:#10264A;" d="M221.9,289.9c0,0-0.5-2.4,1.5-2.9c0,0-0.3,2.4,0.6,2.9c0,0,5.9-1.2,12,2.5
																		c5.3,3.2,8.5,8.9,8.2,15c-0.1,3.3-1.2,6.9-4.5,9.8h-26.3c0,0-8-4.8-2.9-17.7C210.6,299.5,213.2,293.1,221.9,289.9z"/>
                                                                    <path style="fill:#FF9565;" d="M211.5,310c0,0-0.5,10.5,10.9,14.4c10.5,2.4,16.5-4.7,17.3-7.2c0.8-2.5,1-5.8,0-8.2
																		c0,0-11.7,7.9-23.3-5.2C216.4,303.8,216.2,307.2,211.5,310z"/>
                                                                    <path style="fill:#FF9565;" d="M211.9,312.4c0,0-1-2.8-2.5-1.6c-1.6,1.2,0.6,6.3,4.2,6.3C213.6,317.2,212.1,314.8,211.9,312.4z
																		"/>
                                                                    <path style="fill:#FF9565;" d="M240.4,312.4c0,0,1-2.8,2.5-1.6c1.6,1.2,0.4,6.3-3.2,6.3C239.7,317.2,240.4,314.9,240.4,312.4z"
                                                                    />
                                                                    <path style="fill:#FF9565;" d="M222.4,324.4c0,0-0.4,5.3,4.9,5.3c0,0,4.8,0.5,4-5.5C231.4,324.2,228.1,325.6,222.4,324.4z"/>
                                                                    <path style="fill:#211915;" d="M222,373.6v-13.7c0-0.6,0.5-1,1-1h7.3c0.6,0,1,0.5,1,1v13.8c0,0.6-0.5,1-1,1l-7.3-0.1
																		C222.4,374.6,222,374.1,222,373.6z"/>
                                                                    <path style="fill:#FF9565;" d="M196.2,341.2c0,0-9,9-3.7,22.5c1.4,3.5,3.8,6.5,7.1,8.4c3,1.8,7.4,3.6,13.2,3.6
																		c0,0,7,3,13.2-1.8c6.2-4.8-6.7-6.8-8.8-7.1c0,0,1.2-0.8,3.5-1.8c2.3-1,0.5-3.3-2.3-2.6c-2.9,0.7-5.9,3.5-6.9,5.4
																		c0,0-13.8-3-8.7-17C202.8,351,197.7,348.6,196.2,341.2z"/>
                                                                    <path style="fill:#FF9565;" d="M257.1,340.4c0,0,9,9,3.7,22.5c-1.4,3.5-3.8,6.5-7.1,8.4c-3,1.8-7.4,3.6-13.2,3.6
																		c0,0-7,3-13.2-1.8c-6.2-4.8,6.7-6.8,8.8-7.1c0,0-1.2-0.8-3.5-1.8c-2.3-1-0.5-3.3,2.3-2.6c2.9,0.7,5.9,3.5,6.9,5.4
																		c0,0,13.8-3,8.7-17C250.5,350.2,255.6,347.9,257.1,340.4z"/>
                                                                    <path style="fill:#1D75F4;" d="M209.2,388.3c0,0-4.5,1.6-6.4,1.5c-1.9-0.1-7.9-0.2-8.3,2.6c-0.4,2.8,4.5,3.3,8,2.5
																		c3.5-0.9,7.3-0.7,7.3-0.7C208.8,391.7,209.2,388.3,209.2,388.3z"/>
                                                                    <path style="fill:#1D75F4;" d="M244,388.3c0,0,4.5,1.6,6.4,1.5c1.9-0.1,7.9-0.2,8.3,2.6c0.4,2.8-4.5,3.3-8,2.5
																		c-3.5-0.9-7.3-0.7-7.3-0.7C244.4,391.7,244,388.3,244,388.3z"/>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g>
                                                            <g>
                                                                <path style="fill:#FFFFFF;" d="M138.2,102.1h3.1l-2.3,8.2h2.7v9h-7v-8.4L138.2,102.1z M148.6,102.1h3l-2.2,8.2h2.6v9h-6.9v-8.4
																	L148.6,102.1z"/>
                                                            </g>
                                                            <g>
                                                                <path style="fill:#FFFFFF;" d="M349.1,243.6H346l2.3-8.2h-2.7v-9h7v8.4L349.1,243.6z M338.7,243.6h-3l2.2-8.2h-2.6v-9h6.9v8.4
																	L338.7,243.6z"/>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g id="DESIGNED_BY_FREEPIK">
                                                    <path style="fill:#FFFFFF;" d="M325.4,140.7H163.9c-2.5,0-4.6-2.1-4.6-4.6v0c0-2.5,2.1-4.6,4.6-4.6h161.4c2.5,0,4.6,2.1,4.6,4.6v0
														C329.9,138.7,327.9,140.7,325.4,140.7z"/>
                                                    <path style="fill:#FFFFFF;" d="M325.4,156.6H163.9c-2.5,0-4.6-2.1-4.6-4.6v0c0-2.5,2.1-4.6,4.6-4.6h161.4c2.5,0,4.6,2.1,4.6,4.6v0
														C329.9,154.6,327.9,156.6,325.4,156.6z"/>
                                                    <path style="fill:#FFFFFF;" d="M325.4,172.5h-112c-2.5,0-4.6-2.1-4.6-4.6v0c0-2.5,2.1-4.6,4.6-4.6h112c2.5,0,4.6,2.1,4.6,4.6v0
														C329.9,170.5,327.9,172.5,325.4,172.5z"/>
                                                    <path style="fill:#FFFFFF;" d="M277.7,201.3h-72.2c-2.5,0-4.6-2.1-4.6-4.6v0c0-2.5,2.1-4.6,4.6-4.6h72.2c2.5,0,4.6,2.1,4.6,4.6v0
														C282.3,199.3,280.3,201.3,277.7,201.3z"/>
                                                    <path style="fill:#FFFFFF;" d="M269.2,218.4h-55.1c-2.6,0-4.6-2.1-4.6-4.6v0c0-2.6,2.1-4.6,4.6-4.6h55.1c2.6,0,4.6,2.1,4.6,4.6v0
														C273.8,216.3,271.7,218.4,269.2,218.4z"/>
                                                </g>
											</svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="row comment-item py-5">
                                    <div class="col-12">
                                        <div class="comment-item-content p-3 bg-fa text-right position-relative mb-4">
                                            <img src="images/accessory/shop-auther.jpg" alt="">
                                            <strong class="dastnevis ">وحید کدخدا در 2 اسفند 96</strong>
                                            <p class="fs-14 clr-61">
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
                                            </p>
                                            <a href="" class="btn reply-i position-absolute" data-toggle="tooltip" data-placement="top" title="پاسخ">
                                                <i class="fal fa-reply fs-18"></i>
                                            </a>
                                        </div>
                                        <!-- reply-comment -->
                                        <div class="comment-item-content p-3 bg-fa text-right position-relative mb-4 reply-item-content">
                                            <img src="images/accessory/shop-auther.jpg" alt="">
                                            <strong class="dastnevis ">وحید کدخدا در 2 اسفند 96</strong>
                                            <p class="fs-14 clr-61">
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
                                            </p>
                                            <a href="" class="btn reply-i position-absolute" data-toggle="tooltip" data-placement="top" title="پاسخ">
                                                <i class="fal fa-reply fs-18"></i>
                                            </a>
                                        </div>
                                        <div class="comment-item-content p-3 bg-fa text-right position-relative mb-4">
                                            <img src="images/accessory/shop-auther.jpg" alt="">
                                            <strong class="dastnevis ">وحید کدخدا در 2 اسفند 96</strong>
                                            <p class="fs-14 clr-61">
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
                                            </p>
                                            <a href="" class="btn reply-i position-absolute" data-toggle="tooltip" data-placement="top" title="پاسخ">
                                                <i class="fal fa-reply fs-18"></i>
                                            </a>
                                        </div>
                                        <!-- reply-comment -->
                                        <div class="comment-item-content p-3 bg-fa text-right position-relative mb-4 reply-item-content">
                                            <img src="images/accessory/shop-auther.jpg" alt="">
                                            <strong class="dastnevis ">وحید کدخدا در 2 اسفند 96</strong>
                                            <p class="fs-14 clr-61">
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
                                            </p>
                                            <a href="" class="btn reply-i position-absolute" data-toggle="tooltip" data-placement="top" title="پاسخ">
                                                <i class="fal fa-reply fs-18"></i>
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
        <!-- row-product -->
        <section class="container-fluid row-product px-4 pb-5 bg-product related-product">
            <div class=" container">
                <div class="row">
                    <div class="col-12 title-products p-0">
                        <div class="row align-items-end">
                            <div class="col-7 col-lg-9 col-xl-10 text-right">
                                <h3 class="pro-title fs-18 dastnevis header-gradient text-center d-inline-block px-4 mb-0 pb-2">محصولات مرتبط</h3>
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
                                        <a href="#"><img src="images/accessory/04.png" alt=""></a>
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
                                        <a href="#"><img src="images/accessory/04.png" alt=""></a>
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
                                        <a href="#"><img src="images/accessory/04.png" alt=""></a>
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
                                        <a href="#"><img src="images/accessory/04.png" alt=""></a>
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
                                        <a href="#"><img src="images/accessory/04.png" alt=""></a>
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
                                        <a href="#"><img src="images/accessory/04.png" alt=""></a>
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
                                        <a href="#"><img src="images/accessory/04.png" alt=""></a>
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
                                        <a href="#"><img src="images/accessory/04.png" alt=""></a>
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
    </section>
@endsection


@section('page-scripts')

<script type="text/javascript" src={{ asset('js/front/lg/jquery.justifiedGallery.min.js') }}></script>
<script type="text/javascript" src={{ asset('js/front/lg/collapse.js') }}></script>
<script type="text/javascript" src={{ asset('js/front/lg/lightgallery.js') }}></script>
<script type="text/javascript" src={{ asset('js/front/lg/lg-fullscreen.js') }}></script>
<script type="text/javascript" src={{ asset('js/front/lg/lg-thumbnail.js') }}></script>
<script type="text/javascript" src={{ asset('js/front/lg/lg-zoom.js') }}></script>
<script type="text/javascript" src={{ asset('js/front/lg/demos.js') }}></script>

<script type="text/javascript">
    $('#aniimated-thumbnials').lightGallery({
        thumbnail:true
    });
</script>

@endsection
{{--<script type="text/javascript" src="js/custom.js"></script>--}}