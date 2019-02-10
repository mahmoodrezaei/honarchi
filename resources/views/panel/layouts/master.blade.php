<!DOCTYPE html>
<html>
<!-- begin::Head -->

<head>
    <meta charset="utf-8">

    <title>داشبورد کاربران</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <link href="{{ asset('css/panel.css') }}" rel="stylesheet" type="text/css"/>
</head>
<!-- end::Head -->

<!-- begin::body -->

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<div class="m-grid m-grid--hor m-grid--root m-page">

    @include('panel.layouts.header')

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

    @include('panel.layouts.sidebar')

    <!-- Content section -->
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <!--<div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">Content</h3>
                    </div>
                </div>
            </div>-->
            <!-- END: Subheader -->

            <!-- Begin:: ContentSection -->
            <!--<div class="m-content">-->

        @yield('content')

        <!--</div>-->
            <!-- END:: ContentSection -->

        </div>
    </div>

    @include('panel.layouts.footer')
</div>

<!-- begin:: Global Theme Bundle -->

<script src="{{ asset('js/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/panel.js') }}"></script>

<!-- end:: Page Scripts -->

</body>
<!-- end::body -->

</html>