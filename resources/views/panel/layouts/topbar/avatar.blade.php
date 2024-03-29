<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
    m-dropdown-toggle="click" aria-expanded="true">
    <a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="{{ asset('assets/images/user.jpg') }}"
                                                         class="m--img-rounded m--marginless" alt="">
												</span>
        <span class="m-topbar__username m--hide">Nick</span>
    </a>
    <div class="m-dropdown__wrapper" style="z-index: 101;">
        <span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust" style="left: auto; right: 12.5px;"></span>
        <div class="m-dropdown__inner">
            <div class="m-dropdown__header m--align-center"
                 style="background: url({{ asset('assets/images/bg/user_profile_bg.jpg') }}); background-size: cover;">
                <div class="m-card-user m-card-user--skin-dark">
                    <div class="m-card-user__pic">
                        <img src="{{ asset('assets/images/user.jpg') }}"
                             class="m--img-rounded m--marginless" alt="">

                        <!--
<span class="m-type m-type--lg m--bg-danger"><span class="m--font-light">S<span><span>
-->
                    </div>
                    <div class="m-card-user__details">
                        <span class="m-card-user__name m--font-weight-500">Mark Andre</span>
                        <a href="" class="m-card-user__email m--font-weight-300 m-link">mark.andre@gmail.com</a>
                    </div>
                </div>
            </div>
            <div class="m-dropdown__body">
                <div class="m-dropdown__content">
                    <ul class="m-nav m-nav--skin-light">
                        <li class="m-nav__section m--hide">
                            <span class="m-nav__section-text">Section</span>
                        </li>
                        <li class="m-nav__item">
                            <a href="header/profile.html" class="m-nav__link">
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
                        <li class="m-nav__separator m-nav__separator--fit">
                        </li>
                        <li class="m-nav__separator m-nav__separator--fit">
                        </li>
                        <li class="m-nav__item">
                            <a href="/staff/logout"
                               onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();"
                               class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">خروج</a>

                            <form id="admin-logout-form" action="/staff/logout" method="post" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</li>