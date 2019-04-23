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
                product_id: this.$route.params.id,

                isSimple: true,

                options: [],

                selectedOptions: '',

                sending: false,
            }
        },

        created() {
            this.retrieveOptions();
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

            submit() {
                this.sending = true;
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