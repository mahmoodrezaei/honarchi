<template>
    <!-- Start Profile -->
    <section class="container-fluid profile-page">
        <div class="container">
            <div class="row row-profile mb-3">
                <div class="col-lg-3 col-md-4 pt-5 p-right">
                    <div class="profile-box p-info-box bg-ff bx-sh">
                        <div class="profile-image px-3 pt-5 pb-2">
                            <div class="p-img">
                                <img src="/assets/images/front/accessory/shop-auther.jpg" alt="هنرچی">
                                <a href="">
                                    <button class="bg-ff p-1">
                                        <i class="fal fa-edit"></i>
                                    </button>
                                </a>
                            </div>
                            <p class="dastnevis fs-18">
                                تکتم حیدرزاده
                            </p>
                        </div>
                        <div class="profile-pe py-3">
                            <div class="pass-change pe-box">
                                <a href="">
                                    <i class="fal fa-lock-alt"></i>
                                    <p>
                                        تغییر رمز عبور
                                    </p>
                                </a>
                            </div>
                            <div class="exit-profile pe-box">
                                <a href="">
                                    <i class="fal fa-sign-out-alt"></i>
                                    <p>
                                        خروج از سیستم
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="profile-box">
                        <div class="title-products text-center">
                            <h3 class="pro-title fs-18 dastnevis header-gradient d-inline-block px-3 px-md-3 mb-0 pb-2">حساب کاربری من</h3>
                            <hr class="under-title">
                        </div>
                        <div class="pbox p-list-box bg-ff bx-sh px-3 py-3">
                            <ul>
                                <li class="py-2">
                                    <router-link to="/profile/" class="clr-75">
                                        <i class="fal fa-user-alt fs-25"></i>
                                        <span class="px-2">پروفایل من </span>
                                    </router-link>
                                </li>
                                <li class="py-2">
                                    <a href="" class="clr-75">
                                        <i class="fal fa-shopping-basket fs-25"></i>
                                        <span class="px-2">همه سفارش ها</span>
                                    </a>
                                </li>
                                <li class="py-2">
                                    <a href="" class="clr-75">
                                        <i class="fal fa-grin-stars fs-25"></i>
                                        <span class="px-2">لیست علاقه مندی ها</span>
                                    </a>
                                </li>
                                <li class="py-2">
                                    <router-link to="/profile/address" class="clr-75">
                                        <i class="fal fa-map-marked-alt fs-25"></i>
                                        <span class="px-2">آدرس ها</span>
                                    </router-link>
                                </li>
                                <li class="py-2">
                                    <a href="" class="clr-75">
                                        <i class="fal fa-user-circle fs-25"></i>
                                        <span class="px-2">اطلاعات شخصی</span>
                                    </a>
                                </li>
                                <li class="py-2">
                                    <a href="" class="clr-75">
                                        <i class="fal fa-store fs-25"></i>
                                        <span class="px-2">ایجاد فروشگاه</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 mt-2 p-left">
                    <div class="profile-box">
                        <div class="title-products text-right">
                            <h3 class="pro-title fs-18 dastnevis header-gradient d-inline-block px-4 px-md-4 mb-0 mt-0 pb-2">اطلاعات شخصس</h3>
                            <hr class="under-title">
                        </div>
                        <div class="pbox p-info-box bg-ff bx-sh px-3 py-3">
                            <div class="row text-center">
                                <div class="col-lg-4 col-md-6 col-sm-6 my-1 my-md-0 my-lg-3">
                                    <p class="fs-16 pt-2">نام و نام خانوادگی</p>
                                    <p class="dastnevis clr-blue2 fs-18">تکتم حیدرزاده</p>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 my-1 my-md-0 my-lg-3">
                                    <p class="fs-16 pt-2">پست الکترونیک</p>
                                    <p class="clr-blue2 fs-16">info@viranika.com</p>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 my-1 my-md-0 my-lg-3">
                                    <p class="fs-16 pt-2">شماره موبایل</p>
                                    <p class="clr-blue2 fs-16">09120760113</p>
                                </div>
                                <div class="pb-hr d-none d-lg-block"></div>
                                <div class="col-lg-4 col-md-6 col-sm-6 my-1 my-md-0 my-lg-3">
                                    <p class="fs-16 pt-2">کد ملی</p>
                                    <p class="clr-blue2 fs-16">0640495834</p>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 my-1 my-md-0 my-lg-3">
                                    <p class="fs-16 pt-2">دریافت خبرنامه</p>
                                    <p class="dastnevis clr-blue2 fs-18">بلی</p>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 my-1 my-md-0 my-lg-3">
                                    <p class="fs-16 pt-2">شماره کارت</p>
                                    <p class="clr-blue2 fs-16">6104337756449987</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-info btn-round btn-circle circle-1 position-relative fs-16 dastnevis py-2">
                                    <i class="fal fa-user-edit clr-info fs-20 position-relative"></i>
                                    ویرایش اطلاعات  شخصی
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="profile-box">
                        <div class="title-products text-right">
                            <h3 class="pro-title fs-18 dastnevis header-gradient d-inline-block px-4 px-md-4 mb-0 pb-2">لیست آخرین علاقه مندی ها</h3>
                            <hr class="under-title">
                        </div>
                        <div class="pbox p-list-box bg-ff bx-sh px-3 py-3">
                            <div class="row text-center">
                                <div class="col-lg-6 col-md-12 col-sm-12 my-1 my-md-0 my-lg-3">
                                    <a href="">
                                        <div class="wl-img bx-sh p-2 ml-3">
                                            <img src="/assets/images/front/accessory/01.png">
                                        </div>
                                        <div class="wl-txt text-right">
                                            <p class="wl-title clr-42">
                                                عنوان تستی برای محصول
                                            </p>
                                            <p class="wl-price clr-red">
                                                1198000 تومان
                                            </p>
                                        </div>
                                    </a>
                                    <div class="wl-btn">
                                        <button class="clr-75">
                                            <i class="fal fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 my-1 my-md-0 my-lg-3">
                                    <a href="">
                                        <div class="wl-img bx-sh p-2 ml-3">
                                            <img src="/assets/images/front/accessory/01.png">
                                        </div>
                                        <div class="wl-txt text-right">
                                            <p class="wl-title clr-42">
                                                عنوان تستی برای محصول
                                            </p>
                                            <p class="wl-price clr-red">
                                                1198000 تومان
                                            </p>
                                        </div>
                                    </a>
                                    <div class="wl-btn">
                                        <button class="clr-75">
                                            <i class="fal fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 my-1 my-md-0 my-lg-3">
                                    <a href="">
                                        <div class="wl-img bx-sh p-2 ml-3">
                                            <img src="/assets/images/front/accessory/01.png">
                                        </div>
                                        <div class="wl-txt text-right">
                                            <p class="wl-title clr-42">
                                                عنوان تستی برای محصول
                                            </p>
                                            <p class="wl-price clr-red">
                                                1198000 تومان
                                            </p>
                                        </div>
                                    </a>
                                    <div class="wl-btn">
                                        <button class="clr-75">
                                            <i class="fal fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 my-1 my-md-0 my-lg-3">
                                    <a href="">
                                        <div class="wl-img bx-sh p-2 ml-3">
                                            <img src="/assets/images/front/accessory/01.png">
                                        </div>
                                        <div class="wl-txt text-right">
                                            <p class="wl-title clr-42">
                                                عنوان تستی برای محصول
                                            </p>
                                            <p class="wl-price clr-red">
                                                1198000 تومان
                                            </p>
                                        </div>
                                    </a>
                                    <div class="wl-btn">
                                        <button class="clr-75">
                                            <i class="fal fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-info btn-round btn-circle circle-1 position-relative fs-16 dastnevis py-2">
                                    <i class="fal fa-file-edit clr-info fs-20 position-relative"></i>
                                    نمایش لیست علاقه مندی ها
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Profile -->
</template>

<script>
    export default {}
</script>