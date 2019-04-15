<template>
    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">

        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label for="name">نام محصول:</label>
                <input type="text" v-model="productDetail.name" id="name" class="form-control m-input" placeholder="">
                <span class="m-form__help">لطقا نام مخصول را وارد کنید</span>
            </div>
            <div class="col-lg-6">
                <label for="sku">کد محصول</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" v-model="productDetail.sku" id="sku" class="form-control m-input" placeholder="">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-barcode"></i></span></span>
                </div>
                <span class="m-form__help">لطفا کد محصول را وارد کنید</span>
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label for="slug">نامک:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" v-model="productDetail.slug" id="slug" class="form-control m-input" placeholder="">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-"></i></span></span>
                </div>
                <span class="m-form__help">لطفا نامک محصول را بدون فاصله وارد کنید</span>
            </div>
            <div class="col-lg-6">
                <label for="location">محل تولید:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" v-model="productDetail.location" id="location" class="form-control m-input" placeholder="">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-map-marker"></i></span></span>
                </div>
                <span class="m-form__help">لطفا محل تولید محصول را وارد کنید</span>
            </div>
        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label for="gallery">گالری:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" id="gallery" class="form-control m-input" placeholder="">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-"></i></span></span>
                </div>
                <span class="m-form__help">گالری این محصول را مشخص کنید</span>
            </div>
            <div class="col-lg-6">
                <label for="categories">دسته‌بندی:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" id="categories" class="form-control m-input" placeholder="">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-tags"></i></span></span>
                </div>
                <span class="m-form__help">دسته‌بندی این محصول را مشخص کنید</span>
            </div>
        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="short_description">توضیحات کوتاه:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" v-model="productDetail.short_description" id="short_description" class="form-control m-input" placeholder="">
                </div>
                <span class="m-form__help">توضیحات کوتاهی درباره این محصول بنویسید</span>
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="description">توضیحات محصول:</label>
                <div class="m-input-icon m-input-icon--right">
                    <textarea id="description" v-model="productDetail.description" class="form-control m-input" rows="5" placeholder=""></textarea>
                </div>
                <span class="m-form__help">توضیحات محصول را اینجا بنویسید</span>
            </div>
        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="m-form__group form-group row">
            <div class="col-lg-4">
                <div class="m-form__group form-group row">
                    <label class="col-form-label">این محصول فعال باشد:</label>
                    <div class="col-4">
                    <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                        <label>
                            <input type="checkbox" v-model="productDetail.enabled" checked="checked" name="">
                            <span></span>
                        </label>
                    </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <label for="max-purchased-per-rate">حداقل تعداد فروش برای هر ستاره:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" v-model="productDetail.max_purchase_per_rate" id="max-purchased-per-rate" class="form-control m-input" placeholder="">
                </div>
                <span class="m-form__help"></span>
            </div>
            <div class="col-lg-4">
                <label for="published_date">تاریخ انتشار:</label>
                <div class="input-group date">
                    <input type="text" id="published_date" style="direction: ltr" v-model="productDetail.published_date" class="form-control m-input">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar m--font-success"></i>
                        </span>
                    </div>
                    <date-picker v-model="productDetail.published_date" element="published_date"></date-picker>
                </div>
                <span class="m-form__help">تاریخ انتشار محصول را مشخص کنید</span>
            </div>
        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="meta_description">توضیحات متا:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" id="meta_description" class="form-control m-input" placeholder="">
                </div>
                <span class="m-form__help">توضیحات متا (meta description) در این فیلد بنویسید</span>
            </div>
        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="meta_keywords">کلماتت کلیدی:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" id="meta_keywords" class="form-control m-input" placeholder="">
                </div>
                <span class="m-form__help">کلمات کلیدی مخصول را وارد کنید</span>
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
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker'

    // config for VuePersianDatetimePicker
    Vue.use(VuePersianDatetimePicker, {
        name: 'datePicker',
        props: {
            inputFormat: 'YYYY-MM-DD HH:mm',
            format: 'jYYYY-jMM-jDD HH:mm',
            placeholder: 'YYYY-MM-DD HH:mm',
            type: 'datetime',
            color: '#34bfa3'
        }
    });

    export default {
        name: "ProductDetails",

        components: {
            VuePersianDatetimePicker
        },

        data() {
            return {
                productDetail: {
                    sku: '',
                    name: '',
                    slug: '',
                    location: '',
                    short_description: '',
                    description: '',
                    published_date: '',
                    enabled: '',
                    max_purchase_per_rate: ''
                }
            }
        }
    }
</script>

<style scoped>

</style>