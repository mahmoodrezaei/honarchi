<template>
    <div class="col-lg-9 col-md-8 mt-2 p-left">
        <div class="profile-box">
            <div class="title-products text-right">
                <h3 class="pro-title fs-18 dastnevis header-gradient d-inline-block pl-4 pl-md-4 pr-2 mb-0 mt-0 pb-2">
                    <router-link to="/profile/personal/info" class="px-2">
                        <i class="fal fa-arrow-right"></i>
                    </router-link>
                    ویرایش اطلاعات شخصی </h3>
                <hr class="under-title">
            </div>
            <div class="pbox bg-ff bx-sh px-3 py-3">
                <form>
                    <div class="form-group bmd-form-group my-4">
                        <label class="text-right bmd-label-floating">نام</label>
                        <input type="name" class="form-control" v-model="user.first_name">
                    </div>
                    <div class="form-group bmd-form-group my-4">
                        <label class="text-right bmd-label-floating">نام خانوادگی</label>
                        <input type="name" class="form-control" v-model="user.last_name">
                    </div>
                    <div class="form-group bmd-form-group my-4">
                        <label class="text-right bmd-label-floating">کد ملی</label>
                        <input type="text" class="form-control" v-model="user.national_code">
                    </div>
                    <div class="form-group bmd-form-group my-4">
                        <label class="text-right bmd-label-floating">شماره کارت</label>
                        <input type="text" class="form-control" v-model="user.credit_card">
                    </div>
                    <div class="form-group bmd-form-group my-4">
                        <label class="text-right bmd-label-floating">شماره موبایل</label>
                        <input type="text" class="form-control" v-model="user.phone">
                    </div>
                    <div class="form-group bmd-form-group my-4">
                        <label class="text-right bmd-label-floating">پست الکترونیک</label>
                        <input type="email" class="form-control text-left" v-model="user.email">
                    </div>
                    <div class="form-check py-2">
                        <label class="form-check-label">
                            عضویت در خبرنامه هنرچی
                            <input class="form-check-input" type="checkbox" value="" v-model="user.is_subscribed">
                            <span class="form-check-sign">
                  <span class="check"></span>
              </span>
                        </label>
                    </div>
                    <div class="form-group bmd-form-group my-2 text-left my-3">
                        <button type="button" @click="updateUserInfo" class="btn pro-frm-btn">ثبت اطلاعات کاربر</button>
<!--                        <button type="reset" class="btn pro-frm-btn">انصراف</button>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PersonalInfoEdit",

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
                    });
            },

            updateUserInfo() {
                axios.post('/api/user/profile/info', this.user)
                    .then(response => {
                        this.user = response.data.user;
                        flash('اطلاعات شما با موفقیت ثبت شد')
                        this.$forceUpdate();
                    })
                    .catch(error => {
                        console.log(error.response);
                    });
            },
        }
    }
</script>