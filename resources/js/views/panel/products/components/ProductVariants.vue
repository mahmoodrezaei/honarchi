<template>
    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">

        <div v-show="isSimple">
            <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <label for="height">طول:</label>
                    <input type="text" id="height" class="form-control m-input"
                           placeholder="">
                    <!--<span v-if="!errors.name" class="m-form__help">لطقا نام مخصول را وارد کنید</span>
                    <form-error v-if="errors.name" :errors="errors">{{ errors.name[0] }}</form-error>-->
                </div>
                <div class="col-lg-6">
                    <label for="sku">عرض:</label>
                    <div class="m-input-icon">
                        <input type="text" id="sku" class="form-control m-input"
                               placeholder="">
                    </div>
                    <!--<span v-if="!errors.sku" class="m-form__help">لطفا کد محصول را وارد کنید</span>
                    <form-error v-if="errors.sku" :errors="errors">{{ errors.sku[0] }}</form-error>-->
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <label for="depth">ارتفاع:</label>
                    <div class="m-input-icon">
                        <input type="text" id="depth" class="form-control m-input"
                               placeholder="">
                    </div>
                    <!--<span v-if="!errors.slug" class="m-form__help">لطفا نامک محصول را بدون فاصله وارد کنید</span>
                    <form-error v-if="errors.slug" :errors="errors">{{ errors.slug[0] }}</form-error>-->
                </div>
                <div class="col-lg-6">
                    <label for="weight">وزن:</label>
                    <div class="m-input-icon m-input-icon--right">
                        <input type="text" id="weight"
                               class="form-control m-input" placeholder="">
                        <span class="m-input-icon__icon m-input-icon__icon--right"><span><i
                                class="fa fa-weight"></i></span></span>
                    </div>
                    <!--<span v-if="!errors.location" class="m-form__help">لطفا محل تولید محصول را وارد کنید</span>
                    <form-error v-if="errors.location" :errors="errors">{{ errors.location[0] }}</form-error>-->
                </div>
            </div>

            <div class="m-form__seperator m-form__seperator--dashed"></div>

            <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <label for="purchased_price">قیمت خرید:</label>
                    <div class="m-input-icon">
                        <input type="text" id="purchased_price" class="form-control m-input"
                               placeholder="">
                    </div>
                    <!--<span v-if="!errors.sku" class="m-form__help">لطفا کد محصول را وارد کنید</span>
                    <form-error v-if="errors.sku" :errors="errors">{{ errors.sku[0] }}</form-error>-->
                </div>
            </div>

            <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <label for="original_price">قیمت:</label>
                    <input type="text" id="original_price" class="form-control m-input"
                           placeholder="">
                    <!--<span v-if="!errors.name" class="m-form__help">لطقا نام مخصول را وارد کنید</span>
                    <form-error v-if="errors.name" :errors="errors">{{ errors.name[0] }}</form-error>-->
                </div>
            </div>

            <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <label for="major_no">حداقل تعدا برای فروش عمده:</label>
                    <div class="m-input-icon">
                        <input type="text" id="major_no" class="form-control m-input"
                               placeholder="">
                    </div>
                    <!--<span v-if="!errors.slug" class="m-form__help">لطفا نامک محصول را بدون فاصله وارد کنید</span>
                    <form-error v-if="errors.slug" :errors="errors">{{ errors.slug[0] }}</form-error>-->
                </div>
                <div class="col-lg-6">
                    <label for="major_price">قیمت خرید عمده:</label>
                    <div class="m-input-icon">
                        <input type="text" id="major_price" class="form-control m-input"
                               placeholder="">
                    </div>
                    <!--<span v-if="!errors.slug" class="m-form__help">لطفا نامک محصول را بدون فاصله وارد کنید</span>
                    <form-error v-if="errors.slug" :errors="errors">{{ errors.slug[0] }}</form-error>-->
                </div>
            </div>

            <div class="form-group m-form__group row">
                <div class="col-lg-4">
                    <label for="discount_price">قیمت ویژه:</label>
                    <div class="m-input-icon m-input-icon--right">
                        <input type="text" id="discount_price"
                               class="form-control m-input" placeholder="">
                    </div>
                    <!--<span v-if="!errors.location" class="m-form__help">لطفا محل تولید محصول را وارد کنید</span>
                    <form-error v-if="errors.location" :errors="errors">{{ errors.location[0] }}</form-error>-->
                </div>
                <div class="col-lg-4">
                    <label for="starts_at">تاریخ شروع:</label>
                    <div class="m-input-icon m-input-icon--right">
                        <input type="text" id="starts_at"
                               v-model="productVariant[0].pricingConfiguration.discountPrice.startsAt"
                               class="form-control m-input" placeholder="">
                    </div>
                    <date-picker v-model="productVariant[0].pricingConfiguration.discountPrice.startsAt" element="starts_at"></date-picker>
                    <!--<span v-if="!errors.location" class="m-form__help">لطفا محل تولید محصول را وارد کنید</span>
                    <form-error v-if="errors.location" :errors="errors">{{ errors.location[0] }}</form-error>-->
                </div>
                <div class="col-lg-4">
                    <label for="ends_at">تاریخ پایان:</label>
                    <div class="m-input-icon m-input-icon--right">
                        <input type="text" id="ends_at"
                               v-model="productVariant[0].pricingConfiguration.discountPrice.endsAt"
                               class="form-control m-input" placeholder="">
                        <date-picker v-model="productVariant[0].pricingConfiguration.discountPrice.endsAt" element="ends_at"></date-picker>
                    </div>
                    <!--<span v-if="!errors.location" class="m-form__help">لطفا محل تولید محصول را وارد کنید</span>
                    <form-error v-if="errors.location" :errors="errors">{{ errors.location[0] }}</form-error>-->
                </div>
            </div>

        </div>

        <div v-show="!isSimple">
            product has variants
        </div>

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
</template>

<script>
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker'

    // config for VuePersianDatetimePicker
    Vue.use(VuePersianDatetimePicker, {
        name: 'datePicker',
        props: {
            inputFormat: 'jYYYY/jMM/jDD HH:mm',
            format: 'YYYY/MM/DD HH:mm',
            placeholder: 'YYYY/MM/DD HH:mm',
            type: 'datetime',
            color: '#34bfa3'
        }
    });

    export default {
        name: "ProductVariants",

        data() {
            return {
                id: this.$route.params.id,

                isSimple: '',

                productVariant: [{
                    name: '',
                    code: '',
                    height: '',
                    width: '',
                    depth: '',
                    weight: '',
                    onHand: '',

                    pricingConfiguration: {
                        originalPrice: '',
                        purchasedPrice: '',
                        discountPrice: {
                            price: '',
                            startsAt: '',
                            endsAt: ''
                        },
                        majorPrice: {
                            price: '',
                            no: ''
                        },
                        promotionPrice: ''
                    },

                    options: '',
                }],

                sending: false,

                errors: '',
            }
        },

        created() {
            this.retrieveProductVariants();
        },

        methods: {
            retrieveProductVariants() {
                axios.get(`/api/admin/products/${this.id}/variants`)
                    .then(response => {
                        console.log(response.data.data);
                        this.isSimple = response.data.data.is_simple
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
                axios.post(`/api/admin/products/${this.id}/variants`)
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