<template>
    <div class="col-lg-3 col-md-4 pt-5 p-right">
        <div class="profile-box p-info-box bg-ff bx-sh">
            <div class="profile-image px-3 pt-5 pb-2">
                <div class="p-img">
                    <img :src="avatar" alt="هنرچی">
                    <a>
                        <button class="bg-ff p-1">
                            <label for="avatar" style="cursor: pointer">
                                <i class="fal fa-edit"></i>
                            </label>
                        </button>
                        <input @change="updateAvatar" type="file" id="avatar" name="avatar" accept="image/*" class="d-none">
                    </a>
                </div>
                <p class="dastnevis fs-18">
                    {{ userFullName }}
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
                    <a href="/logout" @click.prevent="logout">
                        <i class="fal fa-sign-out-alt"></i>
                        <p>
                            خروج از سیستم
                        </p>
                    </a>

                    <form id="logout-form" action="/logout" method="POST" style="display: none;"></form>

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
                        <router-link to="/profile/my-orders" class="clr-75">
                            <i class="fal fa-shopping-basket fs-25"></i>
                            <span class="px-2">همه سفارش ها</span>
                        </router-link>
                    </li>
                    <li class="py-2">
                        <router-link to="/profile/wishlist" class="clr-75">
                            <i class="fal fa-grin-stars fs-25"></i>
                            <span class="px-2">لیست علاقه مندی ها</span>
                        </router-link>
                    </li>
                    <li class="py-2">
                        <router-link to="/profile/address" class="clr-75">
                            <i class="fal fa-map-marked-alt fs-25"></i>
                            <span class="px-2">آدرس ها</span>
                        </router-link>
                    </li>
                    <li class="py-2">
                        <router-link to="/profile/personal/info" class="clr-75">
                            <i class="fal fa-user-circle fs-25"></i>
                            <span class="px-2">اطلاعات شخصی</span>
                        </router-link>
                    </li>
                    <li class="py-2">
                        <router-link to="/profile/shop/info" class="clr-75">
                            <i class="fal fa-store fs-25"></i>
                            <span class="px-2">ایجاد فروشگاه</span>
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: '',
                avatar: '',
            }
        },

        created() {
            this.getUserInfo();
        },

        methods: {
            getUserInfo() {
                axios.get('/api/user/profile/info')
                    .then(response => {
                        // console.log(response.data.user);
                        this.user = response.data.user;
                        this.avatar = response.data.user.avatar_path;
                        this.$forceUpdate();
                    })
                    .catch(error => {
                        console.log(error.response);
                    });
            },

            updateAvatar(e) {
                if (! e.target.files.length) return;

                let file = e.target.files[0];

                this.avatar = URL.createObjectURL(file);

                // prepare data for sending to server
                let form = new FormData();

                form.append('avatar', file);

                axios.post('/api/user/profile/avatar', form)
                    .then(response => {
                        console.log(response.data);
                        flash(response.data.message);
                    })
                    .catch(error => console.log(error.response));
            },

            logout() {
                document.getElementById('logout-form').submit();
            }
        },

        computed: {
            userFullName() {
                return this.user.first_name + ' ' + this.user.last_name;
            }
        }
    }
</script>