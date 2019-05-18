@extends('public.layouts.master')

@section('content')

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

@endsection