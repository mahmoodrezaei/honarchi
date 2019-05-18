<template>
    <!-- Start Profile -->
    <section class="container-fluid profile-page">
        <div class="container">
            <div class="row row-profile mb-3">
                <div class="col-lg-3 col-md-4 pt-5 p-right">
                    <div class="profile-box p-info-box bg-ff bx-sh">
                        <div class="profile-image px-3 pt-5 pb-2">
                            <div class="p-img">
                                <img src="images/accessory/shop-auther.jpg" alt="هنرچی">
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
                                    <a href="" class="clr-75">
                                        <i class="fal fa-user-alt fs-25"></i>
                                        <span class="px-2">پروفایل من </span>
                                    </a>
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
                                    <a href="" class="clr-75">
                                        <i class="fal fa-map-marked-alt fs-25"></i>
                                        <span class="px-2">آدرس ها</span>
                                    </a>
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
                        <div class="pbox bg-ff bx-sh px-3 py-3">
                            <div class="row text-right">
                                <div class="col-lg-12 col-md-12 col-sm-12 my-1">
                                    <p class="fs-16 m-0">وحید کدخدا</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 my-1">
                                    <p class="fs-16 m-0">استان خراسان جنوبی  ، شهر بیرجند ، آدرس پستی تستی</p>
                                </div>
                            </div>
                            <div class="ab-hr d-none d-lg-block"></div>
                            <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                                <i class="fal fa-barcode-read fs-20 d-inline-block"></i>
                                <p class="fs-14 m-0 mr-2 d-inline-block">کد پستی :</p>
                                <p class="fs-14 m-0 mr-2 d-inline-block">9719897198</p>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                                <i class="fal fa-mobile-alt fs-25 mr-1 d-inline-block"></i>
                                <p class="fs-14 m-0 mr-2 d-inline-block">تلفن همراه :</p>
                                <p class="fs-14 m-0 mr-2 d-inline-block">09120760113</p>
                            </div>
                            <div class="text-left">
                                <button class="btn pro-frm-btn">ویرایش</button>
                                <button class="btn pro-frm-btn">حذف</button>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-round add-address-btn p-4 my-4 clr-75 fs-18" data-toggle="modal" data-target="#add-address">
                        <i class="fal fa-map-marker-plus d-block my-1"></i>
                        افزودن آدرس جدید
                    </button>
                    <div class="modal fade" id="add-address" tabindex="-1" role="">
                        <div class="modal-dialog modal-login modal-lg" role="document">
                            <div class="modal-content">
                                <div class="card card-signup card-plain">
                                    <div class="modal-header">
                                        <button type="button" class="close mt-0" data-dismiss="modal" aria-label="Close">
                                            <i class="fal fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form" method="" action="">
                                            <p class="text-center">
                                                <img src="images/logo.svg" alt="هنرچی" style="width: 250px;">
                                            </p>
                                            <div class="card-body text-right">
                                                <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                                                    <i class="fal fa-map-marked-alt fs-20 d-inline-block"></i>
                                                    <p class="fs-14 m-0 mr-2 d-inline-block">افزودن آدرس جدید</p>
                                                </div>
                                                <div class="form-group bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fal fa-user"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="نام و نام خانوادگی تحویل گیرنده">
                                                    </div>
                                                </div>
                                                <div class="form-group bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fal fa-mobile-alt"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="شماره همراه ">
                                                    </div>
                                                </div>
                                                <div class="form-group bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fal fa-map-marker-alt"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="استان">
                                                    </div>
                                                </div>
                                                <div class="form-group bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fal fa-map-marked"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="شهر">
                                                    </div>
                                                </div>
                                                <div class="form-group bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fal fa-street-view"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="آدرس پستی">
                                                    </div>
                                                </div>
                                                <div class="form-group bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fal fa-barcode-read"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="کد پستی">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="submit" class="btn pro-frm-btn px-4">ثبت آدرس</button>
                                    </div>
                                </div>
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
    export default {
        name: "Address.vue"
    }
</script>