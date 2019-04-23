<template>
    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="m-form__group form-group align-content-center row">
            <div class="col-lg-6 mb-5">
                <label for="products">محصولات پیشنهادی:</label>
                <multiselect v-model="recommendations"
                             placeholder=""
                             id="products"
                             :disabled="false"
                             :selectLabel="'انتخاب'"
                             :selectedLabel="'انتخاب شده'"
                             :deselectLabel="'حذف'"
                             label="name" track-by="name"
                             :multiple="true"
                             :options="products"></multiselect>
                <span class="m-form__help">محصولات پیشنهادی را انتخاب کنید</span>
            </div>
            <div class="col-lg-6">
                <div class="m-list-timeline">
                    <div class="m-list-timeline__items">
                        <div class="m-list-timeline__item" v-for="item in recommendations">
                            <span class="m-list-timeline__badge"></span>
                            <h4 class="m-list-timeline__text">{{ item.name }}</h4>
                        </div>
                    </div>
                </div>
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
        name: "ProductRecommendation",

        components: { Multiselect },

        data() {
            return {
                id: this.$route.params.id,

                products: [],

                recommendations: [],

                sending: false,
            }
        },

        created() {
            this.retrieveProducts();
        },

        methods: {
            retrieveProducts() {
                axios.get('/api/admin/products/names')
                    .then(response => {
                        this.products = response.data;
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