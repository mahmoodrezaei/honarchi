<template>
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
                        <p class="dastnevis clr-blue2 fs-18">{{ userFullName }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 my-1 my-md-0 my-lg-3">
                        <p class="fs-16 pt-2">پست الکترونیک</p>
                        <p class="clr-blue2 fs-16">{{ user.email }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 my-1 my-md-0 my-lg-3">
                        <p class="fs-16 pt-2">شماره موبایل</p>
                        <p class="clr-blue2 fs-16">{{ user.phone }}</p>
                    </div>
                    <div class="pb-hr d-none d-lg-block"></div>
                    <div class="col-lg-4 col-md-6 col-sm-6 my-1 my-md-0 my-lg-3">
                        <p class="fs-16 pt-2">کد ملی</p>
                        <p class="clr-blue2 fs-16">{{ user.national_code }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 my-1 my-md-0 my-lg-3">
                        <p class="fs-16 pt-2">دریافت خبرنامه</p>
                        <p class="dastnevis clr-blue2 fs-18" v-if="user.is_subscribed">بلی</p>
                        <p class="dastnevis clr-blue2 fs-18" v-else>خیر</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 my-1 my-md-0 my-lg-3">
                        <p class="fs-16 pt-2">شماره کارت</p>
                        <p class="clr-blue2 fs-16">{{ user.credit_card }}</p>
                    </div>
                </div>
                <div class="text-center">
                    <router-link to="/profile/personal/edit">
                        <button class="btn btn-info btn-round btn-circle circle-1 position-relative fs-16 dastnevis py-2">
                            <i class="fal fa-user-edit clr-info fs-20 position-relative"></i>
                            ویرایش اطلاعات  شخصی
                        </button>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PersonalInfo",

        data() {
            return {
                user: '',
            }
        },

        mounted() {
            this.getUserInfo();
        },

        methods: {
            getUserInfo() {
                axios.get('/api/user/profile/info')
                    .then(response => this.user = response.data.user)
                    .catch(error => {
                        console.log(error.response);
                    })
            }
        },

        computed: {
            userFullName() {
                return this.user.first_name + ' ' + this.user.last_name;
            }
        }
    }
</script>