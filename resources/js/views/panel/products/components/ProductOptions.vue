<template>
    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="m-form__group form-group row">
            <div class="col-lg-6">
                <div class="m-form__group form-group row">
                    <label class="col-form-label">محصول ساده:</label>
                    <div class="col-6">
                        <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                            <label>
                                <input type="checkbox" checked="checked" v-model="isSimple" name="">
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" v-show="!isSimple">
                <label for="published_date">تاریخ انتشار:</label>
                <div class="input-group date">
                    <input type="text" id="published_date" style="direction: ltr" class="form-control m-input">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar m--font-success"></i>
                        </span>
                    </div>
                </div>
                <span class="m-form__help">تاریخ انتشار محصول را مشخص کنید</span>
            </div>
        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>


        <div class="m-form__actions">
            <div class="row">
                <div class="col-lg-6">
                    <button type="reset" class="btn btn-success">ثبت</button>
                </div>
            </div>
        </div>

    </form>
</template>

<script>
    import {MultiSelect} from 'vue-search-select'

    export default {
        name: "ProductOptions",

        components: { MultiSelect },

        data() {
            return {
                isSimple: true,

                selectedOptions: [],
            }
        }
    }
</script>

<style scoped>

</style>