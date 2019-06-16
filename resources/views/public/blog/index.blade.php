@extends('public.layouts.master')

@section('content')
    <!-- Start ArchiveArticle -->
    <section class="container-fluid info-box">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-area text-center bx-sh bg-ff py-2">
                        <nav class="d-inline-block" aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb bg-ff dastnevis">
                                <li class="breadcrumb-item"><a class="clr-61" href="#">صفحه اصلی</a></li>
                                <li class="breadcrumb-item"><a class="clr-61" href="#">وبلاگ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">اخبار هنرچی</li>
                            </ol>
                        </nav>
                        <div class="title-article">
                            <h1 class="dastnevis header-gradient fs-25">اخبار هنرچی</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid cont-archive pt-3 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-4 sidebar">
                    <div class="title-products text-center">
                        <h3 class="pro-title fs-18 dastnevis header-gradient text-center d-inline-block px-3 px-md-5 mb-0 pb-2">دسته های وبلاگ</h3>
                        <hr class="under-title">
                    </div>
                    <div class="content-bio p-sm-0 p-md-3 pt-4 bg-ff bx-sh text-right position-relative">
                        <div class="form-check">
                            <label class="form-check-label d-block mb-3 clr-75 fs-12">
                                <input class="form-check-input" type="checkbox" value="">
                                سفال
                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                            </span>
                            </label>
                            <label class="form-check-label d-block mb-3 clr-75 fs-12">
                                <input class="form-check-input" type="checkbox" value="">
                                سرامیک
                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                            </span>
                            </label>
                            <label class="form-check-label d-block mb-3 clr-75 fs-12">
                                <input class="form-check-input" type="checkbox" value="">
                                چرم دوزی
                                <span class="form-check-sign">
                                                 <span class="check"></span>
                                         </span>
                            </label>
                            <label class="form-check-label d-block mb-3 clr-75 fs-12">
                                <input class="form-check-input" type="checkbox" value="">
                                سوزن دوزی
                                <span class="form-check-sign">
                                                 <span class="check"></span>
                                         </span>
                            </label>
                        </div>
                    </div>
                    <div class="title-products text-center">
                        <h3 class="pro-title fs-18 dastnevis header-gradient text-center d-inline-block px-3 px-md-5 mb-0 pb-2">لینک های مرتبط</h3>
                        <hr class="under-title">
                    </div>
                    <div class="content-bio p-sm-0 p-md-3 pt-4 bg-ff bx-sh text-right position-relative">
                        <ul class="useful-link">
                            <li class="d-block">
                                <a class="p-2 mb-1 bg-fa d-block clr-42 fs-14" href="#">چیدمان پیشنهادی ما</a>
                            </li>
                            <li class="d-block">
                                <a class="p-2 mb-1 bg-fa d-block clr-42 fs-14" href="#">کادو چی بگیرم ؟</a>
                            </li>
                            <li class="d-block">
                                <a class="p-2 mb-1 bg-fa d-block clr-42 fs-14" href="#">کار دست تو</a>
                            </li>
                            <li class="d-block">
                                <a class="p-2 mb-1 bg-fa d-block clr-42 fs-14" href="#">رادیو هنرچی</a>
                            </li>
                            <li class="d-block">
                                <a class="p-2 mb-1 bg-fa d-block clr-42 fs-14" href="#">هنرچی در رسانه</a>
                            </li>
                        </ul>
                    </div>
                    <div class="title-products text-center">
                        <h3 class="pro-title fs-18 dastnevis header-gradient text-center d-inline-block px-3 px-md-5 mb-0 pb-2">پست های محبوب</h3>
                        <hr class="under-title">
                    </div>
                    <div class="content-bio p-sm-0 p-md-3 pt-4 bg-ff bx-sh text-right position-relative">
                        <a class="mb-3 d-block popular-post" href="#">
                            <div class="popular-img d-inline-block">
                                <img src="images/accessory/blog01.jpg" alt="">
                            </div>
                            <div class="popular-title d-inline">
                                <h3 class="iransans fs-14 clr-42 m-0">محل قرار گرفتن عنوان تستی محل قرار گرفتن عنوان تستی</h3>
                            </div>
                        </a>
                        <a class="mb-3 d-block popular-post" href="#">
                            <div class="popular-img d-inline-block">
                                <img src="images/accessory/blog01.jpg" alt="">
                            </div>
                            <div class="popular-title d-inline">
                                <h3 class="iransans fs-14 clr-42 m-0">محل قرار گرفتن عنوان تستی محل قرار گرفتن عنوان تستی</h3>
                            </div>
                        </a>
                        <a class="mb-3 d-block popular-post" href="#">
                            <div class="popular-img d-inline-block">
                                <img src="images/accessory/blog01.jpg" alt="">
                            </div>
                            <div class="popular-title d-inline">
                                <h3 class="iransans fs-14 clr-42 m-0">محل قرار گرفتن عنوان تستی محل قرار گرفتن عنوان تستی</h3>
                            </div>
                        </a>
                        <a class="mb-3 d-block popular-post" href="#">
                            <div class="popular-img d-inline-block">
                                <img src="images/accessory/blog01.jpg" alt="">
                            </div>
                            <div class="popular-title d-inline">
                                <h3 class="iransans fs-14 clr-42 m-0">محل قرار گرفتن عنوان تستی محل قرار گرفتن عنوان تستی</h3>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="col-8 blogs">
                    <div class="row">
                        <div class="col-6">
                            <div class="content-blog bx-sh bg-ff">
                                <div class="date-blog position-absolute fs-12 clr-ff">
                                    <span>24 اسفند 97</span>
                                </div>
                                <div class="img-blog bg-42">
                                    <a href="#">
                                        <img src="images/accessory/blog01.jpg" alt="">
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
                        <div class="col-6">
                            <div class="content-blog bx-sh bg-ff">
                                <div class="date-blog position-absolute fs-12 clr-ff">
                                    <span>24 اسفند 97</span>
                                </div>
                                <div class="img-blog bg-42">
                                    <a href="#">
                                        <img src="images/accessory/blog01.jpg" alt="">
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
                        <div class="col-6">
                            <div class="content-blog bx-sh bg-ff">
                                <div class="date-blog position-absolute fs-12 clr-ff">
                                    <span>24 اسفند 97</span>
                                </div>
                                <div class="img-blog bg-42">
                                    <a href="#">
                                        <img src="images/accessory/blog01.jpg" alt="">
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
                        <div class="col-6">
                            <div class="content-blog bx-sh bg-ff">
                                <div class="date-blog position-absolute fs-12 clr-ff">
                                    <span>24 اسفند 97</span>
                                </div>
                                <div class="img-blog bg-42">
                                    <a href="#">
                                        <img src="images/accessory/blog01.jpg" alt="">
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
                        <div class="col-6">
                            <div class="content-blog bx-sh bg-ff">
                                <div class="date-blog position-absolute fs-12 clr-ff">
                                    <span>24 اسفند 97</span>
                                </div>
                                <div class="img-blog bg-42">
                                    <a href="#">
                                        <img src="images/accessory/blog01.jpg" alt="">
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
                        <div class="col-6">
                            <div class="content-blog bx-sh bg-ff">
                                <div class="date-blog position-absolute fs-12 clr-ff">
                                    <span>24 اسفند 97</span>
                                </div>
                                <div class="img-blog bg-42">
                                    <a href="#">
                                        <img src="images/accessory/blog01.jpg" alt="">
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
                        <div class="page-number col-12 text-center">
                            <nav class="" aria-label="">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i class="fal fa-chevron-right"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item "><a class="page-link" href="#">2 <span class="sr-only">(current)</span></a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fal fa-chevron-left"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection