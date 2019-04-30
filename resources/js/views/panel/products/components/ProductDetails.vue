<template>
    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">

        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label for="name">نام محصول:</label>
                <input type="text" v-model="productDetail.name" id="name" class="form-control m-input" placeholder="">
                <span v-if="!errors.name" class="m-form__help">لطقا نام مخصول را وارد کنید</span>
                <form-error v-if="errors.name" :errors="errors">{{ errors.name[0] }}</form-error>
            </div>
            <div class="col-lg-6">
                <label for="sku">کد محصول</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" v-model="productDetail.sku" id="sku" class="form-control m-input" placeholder="">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-barcode"></i></span></span>
                </div>
                <span v-if="!errors.sku" class="m-form__help">لطفا کد محصول را وارد کنید</span>
                <form-error v-if="errors.sku" :errors="errors">{{ errors.sku[0] }}</form-error>
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label for="slug">نامک:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" v-model="productDetail.slug" id="slug" class="form-control m-input" placeholder="">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-"></i></span></span>
                </div>
                <span v-if="!errors.slug" class="m-form__help">لطفا نامک محصول را بدون فاصله وارد کنید</span>
                <form-error v-if="errors.slug" :errors="errors">{{ errors.slug[0] }}</form-error>
            </div>
            <div class="col-lg-6">
                <label for="location">محل تولید:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" v-model="productDetail.location" id="location" class="form-control m-input" placeholder="">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-map-marker"></i></span></span>
                </div>
                <span v-if="!errors.location" class="m-form__help">لطفا محل تولید محصول را وارد کنید</span>
                <form-error v-if="errors.location" :errors="errors">{{ errors.location[0] }}</form-error>
            </div>
        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label for="gallery">گالری:</label>
                <div class="m-input-icon m-input-icon--right">
                    <multiselect v-model="productDetail.gallery"
                                 placeholder=""
                                 id="gallery"
                                 :selectLabel="'انتخاب'"
                                 :selectedLabel="'انتخاب شده'"
                                 :deselectLabel="'حذف'"
                                 label="gallery_name" track-by="gallery_name"
                                 :value="productDetail.gallery.gallery_name"
                                 :allow-empty="false"
                                 :options="galleries"></multiselect>
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-"></i></span></span>
                </div>
                <span v-if="!errors.gallery" class="m-form__help">گالری این محصول را مشخص کنید</span>
                <form-error v-if="errors.gallery" :errors="errors">{{ errors.gallery[0] }}</form-error>
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
                <span v-if="!errors.short_description" class="m-form__help">توضیحات کوتاهی درباره این محصول بنویسید</span>
                <form-error v-if="errors.short_description" :errors="errors">{{errors.short_description[0] }}</form-error>
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="description">توضیحات محصول:</label>
                <div class="m-input-icon m-input-icon--right">
<!--                    <textarea id="description" v-model="productDetail.description" class="form-control m-input" rows="5" placeholder=""></textarea>-->
                    <TinyMCE_Editor id="description" v-model="productDetail.description" />
                </div>
                <span v-if="!errors.description" class="m-form__help">توضیحات محصول را اینجا بنویسید</span>
                <form-error v-if="errors.description" :errors="errors">{{ errors.description[0] }}</form-error>
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
                <form-error v-if="errors.max_purchase_per_rate" :errors="errors">{{ errors.max_purchase_per_rate[0] }}</form-error>
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
                <span v-if="!errors.published_date" class="m-form__help">تاریخ انتشار محصول را مشخص کنید</span>
                <form-error v-if="errors.published_date" :errors="errors">{{ errors.published_date[0] }}</form-error>
            </div>
        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="m-form__group form-group row">
            <div class="col-lg-4">
                <div class="m-form__group form-group row">
                    <label class="col-form-label">امکان پیش‌خرید محصول:</label>
                    <div class="col-4">
                        <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                            <label>
                                <input type="checkbox" v-model="productDetail.prebuy" checked="checked" name="">
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4" v-show="productDetail.prebuy">
                <label for="prebuy_min">حداقل زمان لازم برای آماده شدن محصول:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" v-model="productDetail.prebuy_min" id="prebuy_min" class="form-control m-input" placeholder="">
                </div>
                <span v-if="!errors.prebuy_min" class="m-form__help"></span>
                <form-error v-if="errors.prebuy_min" :errors="errors">{{ errors.prebuy_min[0] }}</form-error>
            </div>
            <div class="col-lg-4" v-show="productDetail.prebuy">
                <label for="prebuy_max">حداکثر زمان لازم برای آماده شدن محصول:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" v-model="productDetail.prebuy_max" id="prebuy_max" class="form-control m-input" placeholder="">
                </div>
                <span v-if="!errors.prebuy_max" class="m-form__help"></span>
                <form-error v-if="errors.prebuy_max" :errors="errors">{{ errors.prebuy_max[0] }}</form-error>
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
                <label for="meta_keywords">کلمات کلیدی:</label>
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
                    <button type="button" @click="updateProduct" class="btn btn-success" :class="submitBtnLoaderClasses">بروزرسانی</button>
                </div>
            </div>
        </div>

    </form>
</template>

<script>
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker'
    import Multiselect from 'vue-multiselect'
    import FormError from '../../../../components/FormError'
    import TinyMCE_Editor from '../../../../components/tinyMCE'

    // config for VuePersianDatetimePicker
    Vue.use(VuePersianDatetimePicker, {
        name: 'datePicker',
        props: {
            inputFormat: 'YYYY/MM/DD HH:mm',
            format: 'jYYYY/jMM/jDD HH:mm',
            placeholder: 'YYYY/MM/DD HH:mm',
            type: 'datetime',
            color: '#34bfa3'
        }
    });

    export default {
        name: "ProductDetails",

        components: {
            Multiselect,
            VuePersianDatetimePicker,
            FormError,
            TinyMCE_Editor
        },

        data() {
            return {
                id: this.$route.params.id,

                productDetail: {
                    gallery: '',
                    sku: '',
                    name: '',
                    slug: '',
                    location: '',
                    short_description: '',
                    description: '',
                    max_purchase_per_rate: '',
                    published_date: '',
                    enabled: '',
                    prebuy: '',
                    prebuy_min: '',
                    prebuy_max: ''
                },

                galleries: [],

                errors: '',

                sending: false,
            }
        },

        created() {
            this.retrieveProductDetail();
            this.getGalleries();
        },

        methods: {
            retrieveProductDetail() {
                axios.get(`/api/admin/products/${this.id}/show`)
                    .then(response => {
                        this.productDetail = response.data.product;
                    })
                    .catch(errors => {
                        if (errors.message === 'Network Error') {
                            // this.loading = false;
                            flash('خطایی در اتصال به شبکه رخ داده است', 'warning');
                        } else {
                            // this.loading = false;
                            console.log(error.response.data);
                        }
                    });
            },

            getGalleries() {
                axios
                    .get('/api/admin/galleries')
                    .then(response => {
                        this.galleries = response.data.galleries;
                    })
                    .catch(error => console.log(error.response));
            },

            updateProduct() {
                this.sending = true;

                axios.patch(`/api/admin/products/${this.id}/update`, this.productDetail)
                    .then(response => {
                        this.sending = false;
                        if (response.status === 200) {
                            this.productDetail = response.data.product;
                            flash(response.data.message);
                        }
                    })
                    .catch(errors => {
                        if (errors.message === 'Network Error') {
                            flash('خطایی در اتصال به شبکه رخ داده است', 'warning');
                        } else {
                            switch (errors.response.status) {
                                case 422:
                                    this.errors = errors.response.data.errors;
                                    break;
                                case 500:
                                    break;
                                default:
                                    console.log(errors.response);
                            }
                        }

                        console.log(errors.response);
                        this.sending = false;
                    });
            }
        },

        computed: {
            submitBtnLoaderClasses() {
                return this.sending ? 'm-loader m-loader--light m-loader--left' : '';
            }
        }
    }
</script>

<style scoped>

</style>