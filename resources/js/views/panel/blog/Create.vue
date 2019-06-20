<template>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="col col-lg">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">مقاله جدید</h3>
                            </div>
                        </div>

                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <router-link :to="`/admin/articles`">
                                        <button class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--air m-btn--pill">
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
                                    <label for="name">عنوان:</label>
                                    <input type="text" v-model="article.title" id="name" class="form-control m-input"
                                           placeholder="">
                                    <!--<span v-if="!errors.title" class="m-form__help">لطقا عنوان مقاله را وارد کنید</span>
                                    <form-error v-if="errors.title" :errors="errors">{{ errors.title[0] }}</form-error>-->
                                </div>
                                <div class="col-lg-6">
                                    <label for="slug">نامک:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" v-model="article.slug" id="slug" class="form-control m-input"
                                               placeholder="">
                                        <span class="m-input-icon__icon m-input-icon__icon--right"><span><i
                                                class="la la-"></i></span></span>
                                    </div>
                                    <!--<span v-if="!errors.slug" class="m-form__help">لطفا نامک محصول را بدون فاصله وارد کنید</span>
                                    <form-error v-if="errors.slug" :errors="errors">{{ errors.slug[0] }}</form-error>-->
                                </div>
                            </div>

                            <div class="m-form__seperator m-form__seperator--dashed"></div>

                            <div class="form-group m-form__group row">
                                <div class="col-lg-12">
                                    <label for="description">متن مقاله:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <TinyMCE_Editor id="description" v-model="article.body"/>
                                    </div>
                                    <!--<span v-if="!errors.description" class="m-form__help">توضیحات محصول را اینجا بنویسید</span>
                                    <form-error v-if="errors.description" :errors="errors">{{ errors.description[0] }}</form-error>-->
                                </div>
                            </div>

                            <div class="m-form__seperator m-form__seperator--dashed"></div>

                            <div class="m-form__group form-group row">
                                <div class="col-lg-6">
                                    <div class="form-group m-form__group">
                                        <label for="published_date">تاریخ انتشار:</label>
                                        <div class="input-group date">
                                            <input type="text" id="published_date" style="direction: ltr"
                                                   v-model="article.published_date" class="form-control m-input">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar m--font-success"></i>
                                                </span>
                                            </div>
                                            <date-picker v-model="article.published_date" element="published_date"></date-picker>
                                        </div>
                                        <!--<span v-if="!errors.published_date" class="m-form__help">تاریخ انتشار محصول را مشخص کنید</span>
                                        <form-error v-if="errors.published_date" :errors="errors">{{ errors.published_date[0] }}</form-error>-->
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label for="meta_description">توضیحات متا:</label>
                                        <div class="m-input-icon m-input-icon--right">
                                            <input type="text" id="meta_description" class="form-control m-input"
                                                   v-model="article.meta_description" placeholder="">
                                        </div>
                                        <span class="m-form__help">توضیحات متا (meta description) در این فیلد بنویسید</span>
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label for="meta_keywords">کلمات کلیدی:</label>
                                        <div class="m-input-icon m-input-icon--right">
                                            <input type="text" id="meta_keywords" class="form-control m-input"
                                                   v-model="article.meta_keywords" placeholder="">
                                        </div>
                                        <span class="m-form__help">کلمات کلیدی مخصول را وارد کنید</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group m-form__group">
                                    <label for="published_date">تصویر شاخص:</label>
                                    <div class="m-widget29">
                                        <div class="m-widget_content text-center align-content-center">
                                            <img src="" class="mb-3" alt="" width="190" height="190">

                                            <div class="custom-file">
                                                <input class="d-none" type="file" accept="image/*" :id="test_img">
                                                <label class="custom-file-label" :for="test_img">انتخاب فایل</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<span v-if="!errors.published_date" class="m-form__help">تاریخ انتشار محصول را مشخص کنید</span>
                                    <form-error v-if="errors.published_date" :errors="errors">{{ errors.published_date[0] }}</form-error>-->
                                </div>
                            </div>

                            <div class="m-form__seperator m-form__seperator--dashed"></div>

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

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker';
    import TinyMCE_Editor from '../../../components/tinyMCE';

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
        name: "ArticlesCreate.vue",

        components: { VuePersianDatetimePicker, TinyMCE_Editor },

        data() {
            return {
                article: {},

                sending: false,
            }
        },

        methods: {
            submit() {

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