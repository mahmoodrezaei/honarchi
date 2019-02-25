<template>
    <div>
        <!-- BEGIN:: Rigth Aside -->
        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
                class="la la-close"></i></button>
        <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

            <!-- BEGIN: Aside Menu -->
            <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
                 m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500"
                 style="position: relative;">
                <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">

                    <!-- dashboard section -->
                    <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                        <a href="#"
                           class="m-menu__link "><i
                                class="m-menu__link-icon flaticon-line-graph"></i><span
                                class="m-menu__link-title"><span class="m-menu__link-wrap"> <span
                                class="m-menu__link-text">داشبورد</span>
											<span class="m-menu__link-badge"><span
                                                    class="m-badge m-badge--danger">2</span></span> </span></span></a>
                    </li>

                    <!-- request section -->
                    <li class="m-menu__section ">
                        <h4 class="m-menu__section-text">درخواست‌ها</h4>
                        <i class="m-menu__section-icon flaticon-more-v2"></i>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true">
                        <a href="#"
                           class="m-menu__link"><i
                                class="m-menu__link-icon flaticon-add"></i><span
                                class="m-menu__link-title"><span class="m-menu__link-wrap"><span
                                class="m-menu__link-text">درخواست جدید</span> </span></span></a>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true">
                        <a href="#"
                           class="m-menu__link"><i
                                class="m-menu__link-icon flaticon-notes"></i><span
                                class="m-menu__link-title"><span class="m-menu__link-wrap"><span
                                class="m-menu__link-text">سابقه درخواست‌ها</span> </span></span></a>
                    </li>

                    <!-- setting section -->
                    <li class="m-menu__section ">
                        <h4 class="m-menu__section-text">مدیریت کاربران</h4>
                        <i class="m-menu__section-icon flaticon-users"></i>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true">
                        <a href="#"
                           @click.prevent="$router.push('/admin/users')"
                           class="m-menu__link"><i
                                class="m-menu__link-icon flaticon-users"></i><span
                                class="m-menu__link-title"><span class="m-menu__link-wrap"><span
                                class="m-menu__link-text">لیست کاربران</span> </span></span></a>
                    </li>

                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true">
                        <a href="#"
                           @click.prevent="$router.push('/admin/permissions')"
                           class="m-menu__link"><i
                                class="m-menu__link-icon flaticon-user-settings"></i><span
                                class="m-menu__link-title"><span class="m-menu__link-wrap"><span
                                class="m-menu__link-text">اجازه دسترسی‌ها</span> </span></span></a>
                    </li>

                    <!-- setting section -->
                    <li class="m-menu__section ">
                        <h4 class="m-menu__section-text">تنظیمات</h4>
                        <i class="m-menu__section-icon flaticon-more-v2"></i>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true">
                        <a href="#"
                           class="m-menu__link"><i
                                class="m-menu__link-icon flaticon-signs-1"></i><span
                                class="m-menu__link-title"><span class="m-menu__link-wrap"><span
                                class="m-menu__link-text">دسته‌بندی‌ها</span> </span></span></a>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true">
                        <a href="#"
                           class="m-menu__link"><i
                                class="m-menu__link-icon flaticon-map-location"></i><span
                                class="m-menu__link-title"><span class="m-menu__link-wrap"><span
                                class="m-menu__link-text">آدرس</span> </span></span></a>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true">
                        <a href="#"
                           class="m-menu__link"><i
                                class="m-menu__link-icon flaticon-car"></i><span
                                class="m-menu__link-title"><span class="m-menu__link-wrap"><span
                                class="m-menu__link-text">خودروها</span> </span></span></a>
                    </li>

                    <!-- credit section -->
                    <li class="m-menu__section ">
                        <h4 class="m-menu__section-text">مالی</h4>
                        <i class="m-menu__section-icon flaticon-more-v2"></i>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true">
                        <a href="#"
                           class="m-menu__link"><i
                                class="m-menu__link-icon flaticon-coins"></i><span
                                class="m-menu__link-title"><span class="m-menu__link-wrap"><span
                                class="m-menu__link-text">اعتبار</span> </span></span></a>
                    </li>
                </ul>
            </div>

            <!-- END: Aside Menu -->
        </div>
        <!-- END:: Right Aside -->
    </div>
</template>

<script>
    export default {}
</script>