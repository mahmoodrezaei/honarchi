<template>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="col col-lg">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">ویرایش مقاله</h3>
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
                                    <span v-if="!errors.title" class="m-form__help">لطقا عنوان مقاله را وارد کنید</span>
                                    <form-error v-if="errors.title" :errors="errors">{{ errors.title[0] }}</form-error>
                                </div>
                                <div class="col-lg-6">
                                    <label for="slug">نامک:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" v-model="article.slug" id="slug" class="form-control m-input"
                                               placeholder="">
                                        <span class="m-input-icon__icon m-input-icon__icon--right"><span><i
                                                class="la la-"></i></span></span>
                                    </div>
                                    <span v-if="!errors.slug" class="m-form__help">لطفا نامک مقاله را بدون فاصله وارد کنید</span>
                                    <form-error v-if="errors.slug" :errors="errors">{{ errors.slug[0] }}</form-error>
                                </div>
                            </div>

                            <div class="m-form__seperator m-form__seperator--dashed"></div>

                            <div class="form-group m-form__group row">
                                <div class="col-lg-12">
                                    <label for="description">متن مقاله:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <TinyMCE_Editor id="description" v-model="article.body"/>
                                    </div>
                                    <span v-if="!errors.body" class="m-form__help">متن مقاله را اینجا بنویسید</span>
                                    <form-error v-if="errors.body" :errors="errors">{{ errors.body[0] }}</form-error>
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
                                        <span v-if="!errors.published_date" class="m-form__help">تاریخ انتشار مقاله را مشخص کنید</span>
                                        <form-error v-if="errors.published_date" :errors="errors">{{ errors.published_date[0] }}</form-error>
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
                                            <img :src="article.feature_image" class="mb-3" alt="" width="190" height="190">

                                            <div class="custom-file">
                                                <input @change="updateFeatureImage" class="d-none" type="file" accept="image/*" id="test_img">
                                                <label class="custom-file-label" for="test_img">انتخاب فایل</label>
                                            </div>
                                        </div>
                                    </div>
                                    <span v-if="!errors.feature_image" class="m-form__help">تصویر شاخص مقاله را مشخص کنید</span>
                                    <form-error v-if="errors.feature_image" :errors="errors">{{ errors.feature_image[0] }}</form-error>
                                </div>
                            </div>

                            <div class="m-form__seperator m-form__seperator--dashed"></div>

                            <div class="m-form__seperator m-form__seperator--dashed"></div>

                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-success" @click="update"
                                                :class="submitBtnLoaderClasses">بروزرسانی
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
    import FormError from '../../../components/FormError'

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
        name: "ArticlesEdit.vue",

        components: {
            VuePersianDatetimePicker,
            FormError,
            TinyMCE_Editor
        },

        data() {
            return {
                id: this.$route.params.id,

                article: {
                    title: '',
                    slug: '',
                    body: '',
                    published_date: '',
                    feature_image: '',
                    feature_image_file: '',
                    meta_description: '',
                    meta_keywords: ''
                },

                errors: '',

                sending: false,
            }
        },

        mounted() {
            this.getArticle();
        },

        methods: {
            getArticle() {
                axios.get(`/api/admin/articles/${this.id}`)
                    .then(response => {
                        this.article.title = response.data.article.title;
                        this.article.slug = response.data.article.slug;
                        this.article.body = response.data.article.body;
                        this.article.published_date = response.data.article.published_date;
                        this.article.feature_image = response.data.article.feature_image;
                        this.article.meta_description = response.data.article.seo.meta_description;
                        this.article.meta_keywords = response.data.article.seo.meta_keywords;
                    })
                    .catch(errors => {
                        if (errors.message === 'Network Error') {
                            flash('خطایی در اتصال به شبکه رخ داده است', 'warning');
                        } else {
                            console.log(errors.response.data);
                        }
                    });
            },

            update() {
                let data = this.prepareData(this.article);

                this.sending = true;

                axios.patch(`/api/admin/articles/${this.id}/update`, data)
                    .then(response => {
                        console.log(response.data);
                        this.sending = false;
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

            updateFeatureImage(e) {
                if (! e.target.files.length) return;

                let file = e.target.files[0];

                this.article.feature_image = URL.createObjectURL(file);
                this.article.feature_image_file = file;
            },

            prepareData(data) {
                console.log('prepareData was run!!!');

                let form = new FormData();

                form.append('title', data.title);
                form.append('slug', data.slug);

                if (data.feature_image_file !== undefined) {
                    form.append('feature_image', data.feature_image_file);
                }

                form.append('body', data.body);
                form.append('published_date', data.published_date);
                form.append('meta_description', data.meta_description);
                form.append('meta_keywords', data.meta_keywords);

                return form;
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