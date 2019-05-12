<template>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="col col-lg">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">ایجاد محصول جدید</h3>
                            </div>
                        </div>

                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <router-link :to="`/admin/products`">
                                        <button
                                                class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--air m-btn--pill"
                                        >
                                            <i class="fa fa-arrow-left"></i>
                                        </button>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="m-portlet__body">

                        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">

                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label for="name">نام محصول:</label>
                                    <input type="text" v-model="product.name" id="name" class="form-control m-input"
                                           placeholder="">
                                    <span v-if="!errors.name" class="m-form__help">لطقا نام مخصول را وارد کنید</span>
                                    <form-error v-if="errors.name" :errors="errors">{{ errors.name[0] }}</form-error>
                                </div>
                                <div class="col-lg-6">
                                    <label for="sku">کد محصول:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" v-model="product.sku" id="sku" class="form-control m-input"
                                               placeholder="">
                                        <span class="m-input-icon__icon m-input-icon__icon--right"><span><i
                                                class="la la-barcode"></i></span></span>
                                    </div>
                                    <span v-if="!errors.sku" class="m-form__help">لطفا کد محصول را وارد کنید</span>
                                    <form-error v-if="errors.sku" :errors="errors">{{ errors.sku[0] }}</form-error>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label for="slug">نامک:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" v-model="product.slug" id="slug" class="form-control m-input"
                                               placeholder="">
                                        <span class="m-input-icon__icon m-input-icon__icon--right"><span><i
                                                class="la la-"></i></span></span>
                                    </div>
                                    <span v-if="!errors.slug" class="m-form__help">لطفا نامک محصول را بدون فاصله وارد کنید</span>
                                    <form-error v-if="errors.slug" :errors="errors">{{ errors.slug[0] }}</form-error>
                                </div>
                                <div class="col-lg-6">
                                    <label for="location">محل تولید:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" v-model="product.location" id="location"
                                               class="form-control m-input" placeholder="">
                                        <span class="m-input-icon__icon m-input-icon__icon--right"><span><i
                                                class="la la-map-marker"></i></span></span>
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
                                        <multiselect v-model="product.gallery"
                                                     placeholder=""
                                                     id="gallery"
                                                     :selectLabel="'انتخاب'"
                                                     :selectedLabel="'انتخاب شده'"
                                                     :deselectLabel="'حذف'"
                                                     label="gallery_name" track-by="gallery_name"
                                                     :allow-empty="false"
                                                     :options="galleries"></multiselect>
                                        <span class="m-input-icon__icon m-input-icon__icon--right"><span><i
                                                class="la la-"></i></span></span>
                                    </div>
                                    <span v-if="!errors.gallery" class="m-form__help">گالری این محصول را مشخص کنید</span>
                                    <form-error v-if="errors.gallery" :errors="errors">{{ errors.gallery[0] }}</form-error>
                                </div>
                                <div class="col-lg-6">
                                    <label for="categories">دسته‌بندی:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <multiselect v-model="product.categories"
                                                     placeholder=""
                                                     id="categories"
                                                     :selectLabel="'انتخاب'"
                                                     :selectedLabel="'انتخاب شده'"
                                                     :deselectLabel="'حذف'"
                                                     label="name" track-by="name"
                                                     :allow-empty="false"
                                                     :multiple="true"
                                                     :options="categories"></multiselect>
                                        <span class="m-input-icon__icon m-input-icon__icon--right"><span><i
                                                class="la la-tags"></i></span></span>
                                    </div>
                                    <span v-if="!errors.categories" class="m-form__help">دسته‌بندی این محصول را مشخص کنید</span>
                                    <form-error v-if="errors.categories" :errors="errors">{{ errors.categories[0] }}</form-error>
                                </div>
                            </div>

                            <div class="m-form__seperator m-form__seperator--dashed"></div>

                            <div class="form-group m-form__group row">
                                <div class="col-lg-12">
                                    <label for="short_description">توضیحات کوتاه:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" v-model="product.short_description" id="short_description"
                                               class="form-control m-input" placeholder="">
                                    </div>
                                    <span v-if="!errors.short_description" class="m-form__help">توضیحات کوتاهی درباره این محصول بنویسید</span>
                                    <form-error v-if="errors.short_description" :errors="errors">{{errors.short_description[0] }}</form-error>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-12">
                                    <label for="description">توضیحات محصول:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <TinyMCE_Editor id="description" v-model="product.description"/>
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
                                                    <input type="checkbox" v-model="product.enabled" checked="checked"
                                                           name="">
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="max-purchased-per-rate">حداقل تعداد فروش برای هر ستاره:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" v-model="product.max_purchase_per_rate"
                                               id="max-purchased-per-rate" class="form-control m-input" placeholder="">
                                    </div>
                                    <form-error v-if="errors.max_purchase_per_rate" :errors="errors">{{ errors.max_purchase_per_rate[0] }}</form-error>
                                </div>
                                <div class="col-lg-4">
                                    <label for="published_date">تاریخ انتشار:</label>
                                    <div class="input-group date">
                                        <input type="text" id="published_date" style="direction: ltr"
                                               v-model="product.published_date" class="form-control m-input">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar m--font-success"></i>
                                            </span>
                                        </div>
                                        <date-picker v-model="product.published_date" element="published_date"></date-picker>
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
                                                    <input type="checkbox" v-model="product.prebuy" checked="checked" name="">
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4" v-show="product.prebuy">
                                    <label for="prebuy_min">حداقل زمان لازم برای آماده شدن محصول:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" v-model="product.prebuy_min" id="prebuy_min" class="form-control m-input" placeholder="">
                                    </div>
                                    <span v-if="!errors.prebuy_min" class="m-form__help"></span>
                                    <form-error v-if="errors.prebuy_min" :errors="errors">{{ errors.prebuy_min[0] }}</form-error>
                                </div>
                                <div class="col-lg-4" v-show="product.prebuy">
                                    <label for="prebuy_max">حداکثر زمان لازم برای آماده شدن محصول:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" v-model="product.prebuy_max" id="prebuy_max" class="form-control m-input" placeholder="">
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
                                        <input type="text" id="meta_description" class="form-control m-input"
                                               placeholder="">
                                    </div>
                                    <span class="m-form__help">توضیحات متا (meta description) در این فیلد بنویسید</span>
                                </div>
                            </div>

                            <div class="m-form__seperator m-form__seperator--dashed"></div>

                            <div class="form-group m-form__group row">
                                <div class="col-lg-12">
                                    <label for="meta_keywords">کلمات کلیدی:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" id="meta_keywords" class="form-control m-input"
                                               placeholder="">
                                    </div>
                                    <span class="m-form__help">کلمات کلیدی مخصول را وارد کنید</span>
                                </div>
                            </div>

                            <div class="m-form__seperator m-form__seperator--dashed"></div>

                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-success" @click="submit"
                                                :class="submitBtnLoaderClasses">ثبت
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--              <div class="m-form__seperator m-form__seperator&#45;&#45;dashed"></div>-->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker'
    import Multiselect from 'vue-multiselect'
    import FormError from '../../../components/FormError'
    import TinyMCE_Editor from "../../../components/tinyMCE.vue";
    import { categoriesRoutes } from "../../../lib/apiRoutes";

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
        name: "ProductsCreate",

        components: {VuePersianDatetimePicker, FormError, Multiselect, TinyMCE_Editor},

        data() {
            return {
                product: {
                    gallery: '',
                    categories: [],
                    sku: '',
                    name: '',
                    slug: '',
                    location: '',
                    short_description: '',
                    description: '',
                    max_purchase_per_rate: '',
                    published_date: '',
                    enabled: true,
                    prebuy: false,
                    prebuy_min: '',
                    prebuy_max: ''
                },

                galleries: [],
                categories: [],

                sending: false,

                errors: '',
            }
        },

        created() {
            this.getGalleries();
            this.getCategories();
        },

        methods: {
            getGalleries() {
                axios
                    .get('/api/admin/galleries')
                    .then(response => {
                        this.galleries = response.data.galleries;
                    })
                    .catch(error => console.log(error.response));
            },
            getCategories() {
                axios
                    .get(categoriesRoutes.index.url)
                    .then(response => {
                        this.categories = response.data.data
                    })
                    .catch(error => console.log(error.response));
            },

            submit() {

                for(let item in this.product.categories){
                    this.product.categories[item] = this.product.categories[item].id;
                }
               
                this.sending = true;
                this.errors = '';
                axios.post('/api/admin/products', this.product)
                    .then(response => {
                        this.sending = false;
                        this.$router.push({path: `/admin/products/${response.data.product_id}/edit`});
                        // this.$router.push({ path: '/admin/products' });
                        console.log(response.data);
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
            },
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