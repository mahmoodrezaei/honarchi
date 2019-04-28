<template>
    <div>
        <div v-if="isSimple">
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <label for="onHand">موجودی در انبار:</label>
                        <input type="text" v-model="productVariant[0].on_hand" id="onHand" class="form-control m-input" placeholder="">
                        <!--<span v-if="!errors.name" class="m-form__help">لطقا نام مخصول را وارد کنید</span>
                        <form-error v-if="errors.name" :errors="errors">{{ errors.name[0] }}</form-error>-->
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <label for="height">طول:</label>
                        <input type="text" v-model="productVariant[0].height" id="height" class="form-control m-input" placeholder="">
                        <!--<span v-if="!errors.name" class="m-form__help">لطقا نام مخصول را وارد کنید</span>
                        <form-error v-if="errors.name" :errors="errors">{{ errors.name[0] }}</form-error>-->
                    </div>
                    <div class="col-lg-6">
                        <label for="sku">عرض:</label>
                        <input type="text" v-model="productVariant[0].width" id="sku" class="form-control m-input" placeholder="">
                        <!--<span v-if="!errors.sku" class="m-form__help">لطفا کد محصول را وارد کنید</span>
                        <form-error v-if="errors.sku" :errors="errors">{{ errors.sku[0] }}</form-error>-->
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <label for="depth">ارتفاع:</label>
                        <input type="text" v-model="productVariant[0].depth" id="depth" class="form-control m-input" placeholder="">
                        <!--<span v-if="!errors.slug" class="m-form__help">لطفا نامک محصول را بدون فاصله وارد کنید</span>
                        <form-error v-if="errors.slug" :errors="errors">{{ errors.slug[0] }}</form-error>-->
                    </div>
                    <div class="col-lg-6">
                        <label for="weight">وزن:</label>
                        <div class="m-input-icon m-input-icon--right">
                            <input type="text" v-model="productVariant[0].weight" id="weight" class="form-control m-input" placeholder="">
                            <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="fa fa-weight"></i></span></span>
                        </div>
                        <!--<span v-if="!errors.location" class="m-form__help">لطفا محل تولید محصول را وارد کنید</span>
                        <form-error v-if="errors.location" :errors="errors">{{ errors.location[0] }}</form-error>-->
                    </div>
                </div>

                <div class="m-form__seperator m-form__seperator--dashed"></div>

                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <label for="purchased_price">قیمت خرید:</label>
                        <input type="text" id="purchased_price" v-model.number="productVariant[0].pricing_configuration.purchasedPrice" class="form-control m-input" placeholder="">
                        <!--<span v-if="!errors.sku" class="m-form__help">لطفا کد محصول را وارد کنید</span>
                        <form-error v-if="errors.sku" :errors="errors">{{ errors.sku[0] }}</form-error>-->
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <label for="original_price">قیمت:</label>
                        <input type="text" id="original_price" v-model.number="productVariant[0].pricing_configuration.originalPrice" class="form-control m-input" placeholder="">
                        <!--<span v-if="!errors.name" class="m-form__help">لطقا نام مخصول را وارد کنید</span>
                        <form-error v-if="errors.name" :errors="errors">{{ errors.name[0] }}</form-error>-->
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <label for="major_no">حداقل تعدا برای فروش عمده:</label>
                        <input type="text" id="major_no" v-model.number="productVariant[0].pricing_configuration.majorPrice.no" class="form-control m-input" placeholder="">
                        <!--<span v-if="!errors.slug" class="m-form__help">لطفا نامک محصول را بدون فاصله وارد کنید</span>
                        <form-error v-if="errors.slug" :errors="errors">{{ errors.slug[0] }}</form-error>-->
                    </div>
                    <div class="col-lg-6">
                        <label for="major_price">قیمت خرید عمده:</label>
                        <input type="text" id="major_price" v-model.number="productVariant[0].pricing_configuration.majorPrice.price" class="form-control m-input" placeholder="">
                        <!--<span v-if="!errors.slug" class="m-form__help">لطفا نامک محصول را بدون فاصله وارد کنید</span>
                        <form-error v-if="errors.slug" :errors="errors">{{ errors.slug[0] }}</form-error>-->
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <div class="col-lg-4">
                        <label for="discount_price">قیمت ویژه:</label>
                        <input type="text" id="discount_price" v-model.number="productVariant[0].pricing_configuration.discountPrice.price" class="form-control m-input" placeholder="">
                        <!--<span v-if="!errors.location" class="m-form__help">لطفا محل تولید محصول را وارد کنید</span>
                        <form-error v-if="errors.location" :errors="errors">{{ errors.location[0] }}</form-error>-->
                    </div>
                    <div class="col-lg-4">
                        <label for="starts_at">تاریخ شروع:</label>
                        <input type="text" id="starts_at"
                               v-model="productVariant[0].pricing_configuration.discountPrice.startsAt"
                               class="form-control m-input" placeholder="">
                        <date-picker v-model="productVariant[0].pricing_configuration.discountPrice.startsAt" element="starts_at"></date-picker>
                        <!--<span v-if="!errors.location" class="m-form__help">لطفا محل تولید محصول را وارد کنید</span>
                        <form-error v-if="errors.location" :errors="errors">{{ errors.location[0] }}</form-error>-->
                    </div>
                    <div class="col-lg-4">
                        <label for="ends_at">تاریخ پایان:</label>
                        <div class="m-input-icon m-input-icon--right">
                            <input type="text" id="ends_at"
                                   v-model="productVariant[0].pricing_configuration.discountPrice.endsAt"
                                   class="form-control m-input" placeholder="">
                            <date-picker v-model="productVariant[0].pricing_configuration.discountPrice.endsAt" element="ends_at"></date-picker>
                        </div>
                        <!--<span v-if="!errors.location" class="m-form__help">لطفا محل تولید محصول را وارد کنید</span>
                        <form-error v-if="errors.location" :errors="errors">{{ errors.location[0] }}</form-error>-->
                    </div>
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
        </div>


        <!--******************************************** Variant Section ********************************************-->
        <div v-else-if="!isSimple">
            <form>
                <div class="row mb-5">
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-primary" @click="newItem">آیتم جدید</button>
                        <button type="button" class="btn btn-primary">ساخت آیتم از همه متغیرها</button>
                    </div>
                </div>

                <div class="m-accordion m-accordion--bordered" id="m_accordion_2" role="tablist">
                    <!--begin::Item-->
                    <div class="m-accordion__item" v-for="(item, index) in productVariant" :key="index">
                        <div class="m-accordion__item-head collapsed" role="tab" :id="`head` + index" data-toggle="collapse" :href="`#body` + index" aria-expanded="false">
                            <span class="m-accordion__item-icon"><i class="fa flaticon-user-ok"></i></span>
                            <span class="m-accordion__item-title">When an unknown printer took</span>
                            <span class="m-accordion__item-mode"></span>
                        </div>
                        <div class="m-accordion__item-body collapse" :id="`body` + index" role="tabpanel" :aria-labelledby="`head` + index" data-parent="#m_accordion_2" style="">
                            <div class="m-accordion__item-content">
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label for="onHand">موجودی در انبار:</label>
                                        <input type="text" v-model="item.on_hand" id="onHand" class="form-control m-input" placeholder="">
                                        <!--<span v-if="!errors.name" class="m-form__help">لطقا نام مخصول را وارد کنید</span>
                                        <form-error v-if="errors.name" :errors="errors">{{ errors.name[0] }}</form-error>-->
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label for="height">طول:</label>
                                        <input type="text" v-model="item.height" id="height" class="form-control m-input" placeholder="">
                                        <!--<span v-if="!errors.name" class="m-form__help">لطقا نام مخصول را وارد کنید</span>
                                        <form-error v-if="errors.name" :errors="errors">{{ errors.name[0] }}</form-error>-->
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="sku">عرض:</label>
                                        <input type="text" v-model="item.width" id="sku" class="form-control m-input" placeholder="">
                                        <!--<span v-if="!errors.sku" class="m-form__help">لطفا کد محصول را وارد کنید</span>
                                        <form-error v-if="errors.sku" :errors="errors">{{ errors.sku[0] }}</form-error>-->
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label for="depth">ارتفاع:</label>
                                        <input type="text" v-model="item.depth" id="depth" class="form-control m-input" placeholder="">
                                        <!--<span v-if="!errors.slug" class="m-form__help">لطفا نامک محصول را بدون فاصله وارد کنید</span>
                                        <form-error v-if="errors.slug" :errors="errors">{{ errors.slug[0] }}</form-error>-->
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="weight">وزن:</label>
                                        <div class="m-input-icon m-input-icon--right">
                                            <input type="text" v-model="item.weight" id="weight" class="form-control m-input" placeholder="">
                                            <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="fa fa-weight"></i></span></span>
                                        </div>
                                        <!--<span v-if="!errors.location" class="m-form__help">لطفا محل تولید محصول را وارد کنید</span>
                                        <form-error v-if="errors.location" :errors="errors">{{ errors.location[0] }}</form-error>-->
                                    </div>
                                </div>

                                <div class="m-form__seperator m-form__seperator--dashed"></div>

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label for="purchased_price">قیمت خرید:</label>
                                        <input type="text" id="purchased_price" v-model.number="item.pricing_configuration.purchasedPrice" class="form-control m-input" placeholder="">
                                        <!--<span v-if="!errors.sku" class="m-form__help">لطفا کد محصول را وارد کنید</span>
                                        <form-error v-if="errors.sku" :errors="errors">{{ errors.sku[0] }}</form-error>-->
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label for="original_price">قیمت:</label>
                                        <input type="text" id="original_price" v-model.number="item.pricing_configuration.originalPrice" class="form-control m-input" placeholder="">
                                        <!--<span v-if="!errors.name" class="m-form__help">لطقا نام مخصول را وارد کنید</span>
                                        <form-error v-if="errors.name" :errors="errors">{{ errors.name[0] }}</form-error>-->
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label for="major_no">حداقل تعدا برای فروش عمده:</label>
                                        <input type="text" id="major_no" v-model.number="item.pricing_configuration.majorPrice.no" class="form-control m-input" placeholder="">
                                        <!--<span v-if="!errors.slug" class="m-form__help">لطفا نامک محصول را بدون فاصله وارد کنید</span>
                                        <form-error v-if="errors.slug" :errors="errors">{{ errors.slug[0] }}</form-error>-->
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="major_price">قیمت خرید عمده:</label>
                                        <input type="text" id="major_price" v-model.number="item.pricing_configuration.majorPrice.price" class="form-control m-input" placeholder="">
                                        <!--<span v-if="!errors.slug" class="m-form__help">لطفا نامک محصول را بدون فاصله وارد کنید</span>
                                        <form-error v-if="errors.slug" :errors="errors">{{ errors.slug[0] }}</form-error>-->
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-4">
                                        <label for="discount_price">قیمت ویژه:</label>
                                        <input type="text" id="discount_price" v-model.number="item.pricing_configuration.discountPrice.price" class="form-control m-input" placeholder="">
                                        <!--<span v-if="!errors.location" class="m-form__help">لطفا محل تولید محصول را وارد کنید</span>
                                        <form-error v-if="errors.location" :errors="errors">{{ errors.location[0] }}</form-error>-->
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="starts_at">تاریخ شروع:</label>
                                        <input type="text" id="starts_at"
                                               v-model="item.pricing_configuration.discountPrice.startsAt"
                                               class="form-control m-input" placeholder="">
                                        <date-picker v-model="item.pricing_configuration.discountPrice.startsAt" element="starts_at"></date-picker>
                                        <!--<span v-if="!errors.location" class="m-form__help">لطفا محل تولید محصول را وارد کنید</span>
                                        <form-error v-if="errors.location" :errors="errors">{{ errors.location[0] }}</form-error>-->
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="ends_at">تاریخ پایان:</label>
                                        <div class="m-input-icon m-input-icon--right">
                                            <input type="text" id="ends_at"
                                                   v-model="item.pricing_configuration.discountPrice.endsAt"
                                                   class="form-control m-input" placeholder="">
                                            <date-picker v-model="item.pricing_configuration.discountPrice.endsAt" element="ends_at"></date-picker>
                                        </div>
                                        <!--<span v-if="!errors.location" class="m-form__help">لطفا محل تولید محصول را وارد کنید</span>
                                        <form-error v-if="errors.location" :errors="errors">{{ errors.location[0] }}</form-error>-->
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Item-->
                </div>
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
        </div>

    </div>
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
                    on_hand: '',

                    pricing_configuration: {
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
                        this.isSimple = response.data.data.is_simple;
                        this.productVariant = [];
                        let variants = response.data.data.variants;
                        variants.forEach(item => {
                            this.productVariant.push({
                                id: item.id,
                                pricing_id: item.pricing_configuration.id,
                                name: item.name,
                                code: item.code,
                                height: item.height,
                                width: item.width,
                                depth: item.depth,
                                weight: item.weight,
                                on_hand: item.on_hand,
                                pricing_configuration: item.pricing_configuration.configuration,
                                options: item.option_value
                            })
                        })
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
                axios.post(`/api/admin/products/${this.id}/variants`, this.productVariant)
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
            },

            newItem() {
                this.productVariant.push({
                    name: '',
                    code: '',
                    height: '',
                    width: '',
                    depth: '',
                    weight: '',
                    on_hand: '',

                    pricing_configuration: {
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
                })
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