<template>
    <div>
        <div class="row mb-5">
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary" @click="newItem">عکس جدید</button>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4" v-for="(item, index) in gallery"  :key="index">

                <!--begin:: Packages-->
                <div class="m-portlet m-portlet--border-bottom-primary m-portlet--bordered-semi m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text m--font-light">
                                    <a @click.prevent="featureImage(index)" class="btn m-btn btn-sm m-btn--icon m-btn--icon-only m-btn--custom m-btn--air m-btn--pill btn-success m-btn--hover-success">
                                        <i v-if="item.type" class="la la-check m--font-success"></i>
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                    <button v-if="!item.type" @click="deleteItem(item, index)" class="btn m-btn btn-sm m-btn--icon m-btn--icon-only m-btn--custom m-btn--air m-btn--pill btn-outline-danger m-btn--hover-danger">
                                        <i class="la la-remove m--font-danger"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="m-portlet__body">

                        <div class="form-group m-form__group">
                            <input type="text" v-model="item.alt" class="form-control m-input m-input--square" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="توضیحات تصویر">
                            <span class="m-form__help"></span>
                        </div>

                        <div class="form-group m-form__group">
                            <multiselect
                                    v-model="item.variant"
                                    placeholder="متغیر مورد نظر"
                                    :selectLabel="'انتخاب'"
                                    :selectedLabel="'انتخاب شده'"
                                    :deselectLabel="'حذف'"
                                    label="code" track-by="code"
                                    :options="variants"></multiselect>
                            <span class="m-form__help"></span>
                        </div>

                        <div class="m-widget29">
                            <div class="m-widget_content text-center align-content-center">
                                <img :src="item.path" class="mb-3" alt="" width="190" height="190">

                                <div class="custom-file">
                                    <input class="d-none" type="file" @change="loadImage($event, index)" accept="image/*" :id="`customFile` + index">
                                    <label class="custom-file-label" :for="`customFile` + index">انتخاب فایل</label>
                                </div>
                            </div>
                        </div>

<!--                        </form>-->

                    </div>
                </div>

                <!--end:: Packages-->
            </div>
        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="m-form__actions">
            <div class="row">
                <div class="col-lg-6">
                    <button type="button" @click="submit" class="btn btn-success" :class="submitBtnLoaderClasses">ثبت</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import ImageUpload from '../../../../components/ImageUpload'
    import Multiselect from 'vue-multiselect'

    export default {
        name: "ProductGallery",

        components: { ImageUpload, Multiselect },

        data() {
            return {
                id: this.$route.params.id,

                sending: false,

                gallery: [{
                    alt: '',
                    type: true,
                    path: '',
                    file: ''
                    // image: {src: '', file: ''}
                }],

                variants: [],

                errors: ''
            }
        },

        created () {
            this.retrieveProductVariants();
            this.retrieveImages();
        },

        methods: {

            retrieveProductVariants() {
                axios.get(`/api/admin/products/${this.id}/variants`)
                    .then(response => {
                        this.variants = response.data.data.variants;
                        // this.verints = response.data.data;
                    })
                    .catch();
            },

            retrieveImages() {
                axios.get(`/api/admin/products/${this.id}/gallery`)
                    .then(response => {
                        if (response.data.data.length !== 0) {

                            this.gallery = response.data.data;

                           /* this.gallery.forEach((item, index) => {
                                // this.gallery[index]['variant'] = item.variants[0];
                                this.gallery[index]['variant'] = this.variants.find(i => i.id === item.variants[0].id);
                                // console.log(temp);
                            });*/
                        }
                    })
                    .catch(errors => {
                        if (errors.message === 'Network Error') {
                            flash('خطایی در اتصال به شبکه رخ داده است', 'warning');
                        } else {
                            console.log(errors.response.data);
                        }
                    });
            },

            submit() {
                this.sending = true;

                this.gallery.forEach(item => {
                    let form = new FormData();

                    if (item.id) {
                        form.append('id', item.id);
                    }

                    if (item.variant) {
                        form.append('variant', item.variant.id)
                    }

                    form.append('alt', item.alt);
                    form.append('type', item.type);
                    form.append('image', item.file);

                    axios.post(`/api/admin/products/${this.id}/gallery`, form)
                        .then(response => {
                            if (response.status === 200) {
                                flash(response.data.message);
                            }
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
                                        console.log(errors.response.data);
                                }
                            }

                            console.log(errors.response.data);
                            this.sending = false;
                        })
                });

            },

            featureImage(selectedIndex) {

                this.gallery.forEach((item, index) => {
                    if (selectedIndex === index)  this.gallery[index].type = true;
                    else this.gallery[index].type = false;
                });

                this.$forceUpdate();
                /*this.gallery[index].type = true;*/
            },

            loadImage(e, index) {

                let file = e.target.files[0];

                this.gallery[index].file = file;
                this.gallery[index].path = URL.createObjectURL(file)
            },

            newItem() {
                this.gallery.push({
                    alt: '',
                    type: false,
                    path: '',
                    file: ''
                })
            },

            deleteItem(item, index) {
                if (this.gallery.length !== 1) {

                    this.gallery.splice(index, 1);

                    if (item.id != null) {
                        console.log(item);
                        axios.delete(`/api/admin/products/${this.id}/image/${item.id}`)
                            .then(response => {
                                if (response.status === 200) {
                                    flash(response.data.message);
                                    console.log(response.data)
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
                                            console.log(errors.response.data);
                                    }
                                }

                                console.log(errors.response.data);
                                this.sending = false;
                            })
                    }
                }
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