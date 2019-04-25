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
                <label for="options">گزینه‌های محصول:</label>
                <multiselect v-model="selectedOptions"
                             placeholder=""
                             id="options"
                             :disabled="false"
                             :selectLabel="'انتخاب'"
                             :selectedLabel="'انتخاب شده'"
                             :deselectLabel="'حذف'"
                             label="name" track-by="name"
                             :multiple="true"
                             :options="options"></multiselect>
                <span class="m-form__help">گزینه‌های محصول متغیر را مشخص کنید</span>
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

    </form>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    export default {
        name: "ProductOptions",

        components: { Multiselect },

        data() {
            return {
                id: this.$route.params.id,

                isSimple: '',

                options: [],

                selectedOptions: '',

                sending: false,
            }
        },

        created() {
            this.retrieveOptions();
            this.isProductSimple();
        },

        methods: {
            retrieveOptions() {
                axios.get('/api/admin/options')
                    .then(response => {
                        this.options = response.data.options;
                    })
                    .catch(errors => {
                        if (errors.message === 'Network Error') {
                            flash('خطایی در اتصال به شبکه رخ داده است', 'warning');
                        } else {
                            console.log(errors.response.data);
                        }
                    });
            },

            retrieveProductOptions() {

            },

            submit() {
                this.sending = true;
                axios.post(`/api/admin/products/${this.id}/options`, { isSimple: this.isSimple, options: this.selectedOptions })
                    .then(response => {
                        if (response.status === 200) {
                            flash(response.data.message);
                            console.log(response.data);
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
                                    console.log(errors.response);
                            }
                        }

                        console.log(errors.response);
                        this.sending = false;
                    });
            },

            isProductSimple() {
                axios.get(`/api/admin/products/${this.id}/show`)
                    .then(response => {
                        // console.log(response.data)
                        this.isSimple = response.data.product.is_simple;
                    })
                    .catch(errors => {
                        if (errors.message === 'Network Error') {
                            // this.loading = false;
                            flash('خطایی در اتصال به شبکه رخ داده است', 'warning');
                        } else {
                            // this.loading = false;
                            console.log(errors.response.data);
                        }
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