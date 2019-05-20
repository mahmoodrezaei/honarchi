<!DOCTYPE html>
<html>
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
<body class="register-page">
<script type="text/javascript" src="js/buttons.js"></script>
<section class="container-fluid form-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 ">
                <div class="form-image px-3 pt-5 pb-2">
                    <div class="f-img text-center">
                        <a href="#"><img src="/assets/images/front/logo-form.svg" alt="هنرچی"></a>
                    </div>
                </div>
                <form action="/register" method="post" class="content-form bx-sh bg-ff px-3 position-relative">

                    @csrf

                    <div class="form-group bmd-form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text pr-0">
                                    <i class="fal fa-envelope fs-20 clr-92"></i>
                                </div>
                            </div>
                            <input type="text" name="email" class="form-control" placeholder="پست الکترونیک یا شماره همراه">
                        </div>
                    </div>
                    <div class="form-group bmd-form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text pr-0">
                                    <i class="fal fa-lock-alt fs-20 clr-92"></i>
                                </div>
                            </div>
                            <input type="text" name="password" class="form-control" placeholder="رمز عبور">
                        </div>
                    </div>
                    <small id="emailHelp" class="form-text text-muted">
                        <a class="clr-blue2" href="#">رمز عبور خود را فراموش کرده ام</a>
                    </small>
                    <div class="form-check remember">
                        <label class="form-check-label d-block my-3 text-right fs-12">
                            <p class="fs-12">
                                <a class="clr-blue2 Ho-roles" href="#">قوانین و مقررات</a>
                                را مطالعه نمودم و با آن موافقم
                            </p>
                            <input class="form-check-input" type="checkbox" value="">
                            <span class="form-check-sign">
										<span class="check"></span>
									</span>
                        </label>
                    </div>
                    <div class="btn-filter text-center mt-4">
                        <button type="submit" class="btn btn-info btn-round dastnevis btn-circle position-relative fs-16">
                            <i class="fal fa-user-plus clr-gold fs-18 position-relative"></i>
                            عضویت در هنرچی
                        </button>
                    </div>
                    <hr>
                    <p class="fs-12 text-center">قبلا در هنرچی ثبت نام کرده اید ؟
                        <a class="clr-blue2" href="/login">وارد شوید</a>

                    </p>

                </form>


            </div>
            <div class="col-lg-4"></div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <ul>
                    <li class="d-inline-block">
                        <a class="clr-61 fs-13 px-2" href="#">درباره هنرچی</a>
                    </li>
                    <li class="d-inline-block">
                        <a class="clr-61 fs-13 px-2" href="#">همکاری با ما</a>
                    </li>
                    <li class="d-inline-block">
                        <a class="clr-61 fs-13 px-2" href="#">فرصت های شغلی</a>
                    </li>
                    <li class="d-inline-block">
                        <a class="clr-61 fs-13 px-2" href="#">تماس با ما</a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
        <div class="row copyright">
            <div class="col-lg-12 text-center ">
                <p class="m-0 mt-1 iransans fs-13">تمامی حقوق کپی رایت نزد سایت
                    <a class="clr-42" href="#">هنرچی</a>
                    محفوظ است.
                </p>
            </div>
        </div>
    </div>
</section>



<!-- Start JS -->
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
<!-- End JS -->
</body>
</html>