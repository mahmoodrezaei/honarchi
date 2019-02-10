@extends('panel.layouts.master')

@section('content')

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">پروفایل شما</h3>
            </div>
        </div>
    </div>

    <!-- END: Subheader -->
    <div class="m-content">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="m-portlet m-portlet--full-height  ">
                    <div class="m-portlet__body">
                        <div class="m-card-profile">
                            <div class="m-card-profile__title m--hide">
                                پروفایل شما
                            </div>

                            <!-- Profile picture section -->
                            <div class="m-card-profile__pic">
                                <div class="m-card-profile__pic-wrapper">
                                    <img src="assets/app/media/img/users/user4.jpg" alt=""/>
                                </div>
                            </div>

                            <!-- Profile details -->
                            <div class="m-card-profile__details">
                                <span class="m-card-profile__name">احسان مودی</span>
                                <a href="" class="m-card-profile__email m-link">mark.andre@gmail.com</a>
                            </div>
                        </div>
                        <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                            <li class="m-nav__separator m-nav__separator--fit"></li>
                            <li class="m-nav__section m--hide">
                                <span class="m-nav__section-text">Section</span>
                            </li>
                            <li class="m-nav__item">
                                <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                    <span class="m-nav__link-title">
														<span class="m-nav__link-wrap">
															<span class="m-nav__link-text">پروفایل من</span>
															<span class="m-nav__link-badge"><span
                                                                        class="m-badge m-badge--success">2</span></span>
														</span>
													</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-share"></i>
                                    <span class="m-nav__link-text">فعالیت‌ها</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                    <span class="m-nav__link-text">پیام‌ها</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                    <span class="m-nav__link-text">پشتیبانی</span>
                                </a>
                            </li>
                        </ul>
                        <div class="m-portlet__body-separator"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">

                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">

                    <!-- Top bar of profile -->
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary"
                                role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab"
                                       href="#m_user_profile_tab_1" role="tab">
                                        <i class="flaticon-share m--hide"></i>
                                        ویرایش پروفایل
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab"
                                       href="#m_user_profile_tab_2" role="tab">
                                        پیام‌ها
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane active" id="m_user_profile_tab_1">
                            <form class="m-form m-form--fit m-form--state m-form--label-align-right m-form--group-seperator-dashed"
                                  id="profile_form">
                                <div class="m-portlet__body">
                                    <!--begin::Form-->
                                    <div class="m-form__section m-form__section--first">
                                        <div class="m-form__heading m--margin-top-15">
                                            <h3 class="m-form__heading-title">اطلاعات فردی</h3>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6 m-form__group-sub">
                                                <label>نام:</label>
                                                <input type="text" name="first_name"
                                                       class="form-control m-input">
                                            </div>
                                            <div class="col-lg-6 m-form__group-sub">
                                                <label>نام خانوادگی:</label>
                                                <input type="text" name="last_name"
                                                       class="form-control m-input">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6 m-form__group-sub">
                                                <label>کد ملی:</label>
                                                <input type="text" name="national_code"
                                                       class="form-control m-input">
                                            </div>

                                            <div class="col-lg-2 m-form__group-sub">
                                                <label>روز تولد:</label>
                                                <input type="text" name="birth_day"
                                                       class="form-control m-input">
                                            </div>
                                            <div class="col-lg-2 m-form__group-sub">
                                                <label>ماه تولد:</label>
                                                <input type="text" name="birth_month"
                                                       class="form-control m-input">
                                            </div>
                                            <div class="col-lg-2 m-form__group-sub">
                                                <label>سال تولد:</label>
                                                <input type="text" name="birth_year"
                                                       class="form-control m-input">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="m-form__section--last">
                                        <div class="m-form__heading">
                                            <h3 class="m-form__heading-title">اطلاعات تماس</h3>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6 m-form__group-sub">
                                                <label>ایمیل:</label>
                                                <div class="m-input-icon m-input-icon--right">
                                                    <input type="email" name="email"
                                                           class="form-control m-input">
                                                    <span class="m-input-icon__icon m-input-icon__icon--right align-content-center">
                                                                <span>
                                                                    <i class="flaticon-email"></i>
                                                                </span>
                                                            </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 m-form__group-sub">
                                                <label>موبایل:</label>
                                                <input type="text" name="cellphone"
                                                       class="form-control m-input">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-7">
                                                <button type="submit"
                                                        class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                    ثبت تغییرات
                                                </button>&nbsp;&nbsp;
                                                <button type="reset"
                                                        class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                                    بیخیال
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Messages (پیام‌ها) section -->
                        <div class="tab-pane " id="m_user_profile_tab_2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection