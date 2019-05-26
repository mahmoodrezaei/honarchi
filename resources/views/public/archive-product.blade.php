@extends('public.layouts.master')


@section('content')
<!-- Start ArchiveProduct -->
{{--<section class="container-fluid info-box">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-area text-center bx-sh bg-ff py-2">
                    <nav class="d-inline-block" aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb bg-ff dastnevis">
                            <li class="breadcrumb-item"><a class="clr-61" href="#">صفحه اصلی</a></li>
                            <li class="breadcrumb-item"><a class="clr-61" href="#">فروشگاه</a></li>
                            <li class="breadcrumb-item"><a class="clr-61" href="#">زنانه</a></li>
                            <li class="breadcrumb-item"><a class="clr-61" href="#">دکور و تزئینات</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ست هفت سین</li>
                        </ol>
                    </nav>
                    <div class="title-article">
                        <h1 class="dastnevis header-gradient fs-25">ست هفت سین</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>--}}
<section class="container-fluid cont-archive pt-3 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar">
                    <div class="title-products text-center">
                        <h3 class="pro-title fs-18 dastnevis header-gradient text-center d-inline-block px-3 px-md-4 mb-0 ">دسته بندی ها</h3>
                        <hr class="under-title">
                    </div>
                    <div class="content-bio p-2 p-md-3 pt-4 bg-ff bx-sh text-right position-relative">
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
                </div>
                <div class="sidebar">
                    <div class="title-products text-center">
                        <h3 class="pro-title fs-18 dastnevis header-gradient text-center d-inline-block px-3 px-md-4 mb-0 ">جستجوی محصول</h3>
                        <hr class="under-title">
                    </div>
                    <div class="content-bio p-2 p-md-3 pt-4 bg-ff bx-sh text-right position-relative">
                        <div class="input-group ">
                            <div class="form-group bmd-form-group w-100">
                                <label class="bmd-label-floating">دنبال چی می گردی؟</label>
                                <input type="search" class="form-control">
                            </div>
                        </div>
                        <div class="btn-review text-center mt-4">
                            <button class="btn btn-secondary btn-round dastnevis btn-circle position-relative fs-16">
                                <i class="fal fa-search clr-gold fs-20 position-relative"></i>
                                جستجو کن
                            </button>
                        </div>
                    </div>
                </div>
                <div class="sidebar">
                    <div class="title-products text-center">
                        <h3 class="pro-title fs-18 dastnevis header-gradient text-center d-inline-block px-3 px-md-4 mb-0 ">محدوده قیمت</h3>
                        <hr class="under-title">
                    </div>
                    <div class="content-bio p-2 p-md-3 pt-4 bg-ff bx-sh text-right position-relative">
                        <div id="sliderDouble" class="slider slider-rose"></div>
                        <div class="row amount-slider text-center clr-61 fs-14">
                            <div class="col-12 col-lg-6 border-left ">
                                <p class="fs-13">	از</p>
                                <span>23000</span>
                                <p class="fs-13">	تومان</p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="fs-13">تا</p>
                                <span>123000</span>
                                <p class="fs-13">تومان</p>
                            </div>
                        </div>
                        <div class="btn-filter text-center mt-4">
                            <button class="btn btn-info btn-round dastnevis btn-circle position-relative fs-16">
                                <i class="fal fa-filter clr-gold fs-18 position-relative"></i>
                                اعمال فیلتر
                            </button>
                        </div>
                    </div>
                </div>
                <div class="sidebar">
                    <div class="title-products text-center">
                        <h3 class="pro-title fs-18 dastnevis header-gradient text-center d-inline-block px-3 px-md-4 mb-0 ">جنس محصول</h3>
                        <hr class="under-title">
                    </div>
                    <div class="content-bio p-2 p-md-3 pt-4 bg-ff bx-sh text-right position-relative">
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
                </div>
                <div class="sidebar mt-4">
                    <div class="content-bio p-2 p-md-3 pt-4 bg-ff bx-sh text-right position-relative">
                        <div class="switch-content">
                            <span class="clr-61 fs-13">فقط کالاهای موجود</span>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="tslider"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 product-archive mt-5 mt-lg-0">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="title-products d-inline">
                            <h3 class="d-none d-lg-inline-block pro-title fs-18 dastnevis header-gradient text-center px-3 px-md-4 mb-0 ">دسته بندی براساس :</h3>
                            <ul class="orderBy d-inline-block">
                                <li class="d-inline-block">
                                    <a class="fs-12 clr-61 py-1 px-2" href="#">محبوب ترین</a>
                                </li>
                                <li class="d-inline-block">
                                    <a class="fs-12 clr-61 py-1 px-2" href="#">جدیدترین</a>
                                </li>
                                <li class="d-inline-block">
                                    <a class="fs-12 clr-61 py-1 px-2" href="#">پرفروش ترین</a>
                                </li>
                                <li class="d-inline-block">
                                    <a class="fs-12 clr-61 py-1 px-2 active" href="#">ارزان ترین</a>
                                </li>
                                <li class="d-inline-block">
                                    <a class="fs-12 clr-61 py-1 px-2" href="#">گران ترین</a>
                                </li>
                                <li class="d-inline-block">
                                    <a class="fs-12 clr-61 py-1 px-2" href="#">سریع ترین ارسال</a>
                                </li>

                            </ul>
                            <hr class="under-title">
                        </div>
                    </div>

                    @foreach($products as $product)
                        <div class="col-6 col-md-4">
                        <div class="content-product">
                            <div class="img-product">
                                <a href="#"><img src="{{ $product['feature_image']['path'] }}" alt=""></a>
                            </div>
                            <div class="title-product px-2">
                                <a href="#">
                                    <h3 class="iransans fs-16 clr-42 text-center">{{ $product['name'] }}</h3>
                                    <h4 class="iransans fs-12 clr-61 text-center">کد {{ $product['sku'] }}</h4>
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
                                @if($product['price']['discountPrice']['price'])
                                    <del class="d-block text-center clr-b2 mb-1 fs-14">
                                        <span>{{ $product['price']['originalPrice'] }}</span>
                                        <span class="unitmoney">
                                                تومان
                                            </span>
                                    </del>

{{--                                    @php--}}
{{--                                        $now = \Verta::now();--}}
{{--                                    @endphp--}}

{{--                                    @if (($product['price']['discountPrice']['startsAt'] < $now) && ($now < $product['price']['discountPrice']['endsAt']))--}}
                                        <ins  class="d-block text-center clr-red fs-14">
                                            <span>{{ $product['price']['discountPrice']['price'] }}</span>
                                            <span class="unitmoney">
                                                    تومان
                                                </span>
                                        </ins>
{{--                                    @endif--}}

                                @else
                                    <ins  class="d-block text-center clr-red fs-14">
                                        <span>{{ $product['price']['originalPrice'] }}</span>
                                        <span class="unitmoney">
                                                تومان
                                            </span>
                                    </ins>
                                @endif
                            </div>
                            <div class="add-to-cart-product position-absolute">
                                <a class="add-to-cart-link clr-ff bg-green rounded-circle" href="#">
                                    <i class="fal fa-shopping-cart clr-ff"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <div class="col-12 page-number text-center">
                        <nav class="" aria-label="">
                            {{ $products->links() }}
                        </nav>
                    </div>


                    <div class="col-12 page-number text-center">
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