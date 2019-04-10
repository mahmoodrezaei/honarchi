<template>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="col col-lg">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">ایجاد گزینه جدید</h3>
                            </div>
                        </div>

                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <button @click="$router.push('/admin/options')"
                                            class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--air m-btn--pill">
                                        <i class="fa fa-arrow-left"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="m-portlet__body">
                            <!--begin::Form-->
                            <form class="m-form">
                                <div class="m-portlet__body">
                                    <div class="m-form__section m-form__section--first">
                                        <div class="m-form__group form-group row">
                                            <label class="col-lg-2 col-form-label">نوع گزینه</label>
                                            <div class="col-lg-4">
                                                <div class="m-radio-inline">
                                                    <label class="m-radio">
                                                        <input type="radio" name="example_8" value="1"> متن
                                                        <span></span>
                                                    </label>
                                                    <label class="m-radio">
                                                        <input type="radio" name="example_8" value="2">رنگ
                                                        <span></span>
                                                    </label>
                                                    <label class="m-radio">
                                                        <input type="radio" name="example_8" value="3">وابسته
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <span class="m-form__help">نوع گزینه مورد نظر را انتخاب کنید</span>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">Full Name:</label>
                                            <div class="col-lg-4">
                                                <input type="email" class="form-control m-input" placeholder="Enter full name">
                                                <span class="m-form__help">Please enter your full name</span>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">Email address:</label>
                                            <div class="col-lg-4">
                                                <input type="email" class="form-control m-input" placeholder="Enter email">
                                                <span class="m-form__help">We'll never share your email with anyone else</span>
                                            </div>
                                        </div>
<!--                                        <div class="m-form__seperator m-form__seperator&#45;&#45;dashed  m-form__seperator&#45;&#45;space m&#45;&#45;margin-bottom-40"></div>-->
                                    </div>
                                </div>

                                <div class="m-form__actions m-form__actions">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <button type="reset" class="btn btn-success">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                        <div class="col-lg-2">
                                        </div>
                                    </div>
                                </div>

                            </form>

                            <!--end::Form-->
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "OptionsCreate",

        created() {

        },

        methods: {

        }
    }
</script>

<style scoped>

</style>