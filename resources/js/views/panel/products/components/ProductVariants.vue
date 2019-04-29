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
        <div v-else>
            <form>
                <div class="row mb-5">
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-primary" @click="newItem">متغیر جدید</button>
                        <button type="button" class="btn btn-primary" @click="createAllVariants">ساخت متغیر از همه متغیرها</button>
                    </div>
                </div>

                <div class="m-accordion m-accordion--bordered" id="m_accordion_2" role="tablist">
                    <!--begin::Item-->
                    <div class="m-accordion__item" v-for="(item, index) in productVariant" :key="index">
                        <div class="m-accordion__item-head collapsed" role="tab" :id="`head` + index" data-toggle="collapse" :href="`#body` + index" aria-expanded="false">
<!--                            <span class="m-accordion__item-icon"><i class="fa "></i></span>-->
                            <span class="m-accordion__item-title">{{ product.sku }} - {{ item.code }}</span>
                            <span class="m-accordion__item-mode"></span>
                        </div>
                        <div class="m-accordion__item-body collapse" :id="`body` + index" role="tabpanel" :aria-labelledby="`head` + index" data-parent="#m_accordion_2" style="">
                            <div class="m-accordion__item-content">
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-12 mb-2">گزینه‌های محصول:</div>
                                    <div v-for="(option, index) in product.options" :key="index" class="col-lg-6 pb-2">
                                        <multiselect v-model="item.options[index]"
                                                     openDirection="bottom"
                                                     :placeholder="option.name + ` ` + `را انتخاب کنید`"
                                                     id="options"
                                                     :disabled="false"
                                                     :selectLabel="'انتخاب'"
                                                     :selectedLabel="'انتخاب شده'"
                                                     :deselectLabel="'حذف'"
                                                     label="value" track-by="value"
                                                     :options="option.values">
                                            <template slot="singleLabel" slot-scope="{ option }">
                                                <span v-if="option.name === null">{{ option.value }}</span>
                                                <span v-else style="display: flex;">
                                                    <span style="display: block; width: 15px; height: 15px; float: left;" :style="`backgroundColor:` + option.value"></span>
                                                    <span style="display: block; position: relative; bottom: 5px; padding-right: 5px;">{{ option.name }}</span>
                                                </span>
                                            </template>
                                            <template slot="option" slot-scope="{ option }">
                                                <span v-if="option.name === null">{{ option.value }}</span>
                                                <span v-else style="display: flex;">
                                                    <span style="display: block; width: 15px; height: 15px; float: left;" :style="`backgroundColor:` + option.value"></span>
                                                    <span style="display: block; position: relative; bottom: 5px; padding-right: 5px;">{{ option.name }}</span>
                                                </span>
                                            </template>
                                        </multiselect>
                                        <!--<span v-if="!errors.options" class="m-form__help">گزینه‌های محصول متغیر را مشخص کنید</span>
                                        <form-error v-if="errors.options" :errors="errors">{{ errors.options[0] }}</form-error>-->
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label for="onHand">کد محصول متغیر:</label>
<!--                                        <input type="text" v-model="item.code" id="onHand" class="form-control m-input" placeholder="">-->
                                        <div class="input-group m-input-group" style="direction: ltr">
                                            <div class="input-group-prepend"><span class="input-group-text">{{ product.sku }}</span></div>
                                            <input type="text" v-model="item.code" class="form-control m-input" placeholder="" aria-describedby="basic-addon1">
                                        </div>
                                        <!--<span v-if="!errors.name" class="m-form__help">لطقا نام مخصول را وارد کنید</span>
                                        <form-error v-if="errors.name" :errors="errors">{{ errors.name[0] }}</form-error>-->
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="onHand">موجودی در انبار:</label>
                                        <input type="text" v-model.number="item.on_hand" id="onHand" class="form-control m-input" placeholder="">
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

                <div class="m-form__actions" v-show="productVariant.length !== 0">
                    <div class="row mt-5">
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
    import Multiselect from 'vue-multiselect'

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

        components: { Multiselect },

        data() {
            return {
                id: this.$route.params.id,

                isSimple: '',

                product: '',

                productVariant: [{
                    name: '1',
                    code: 1,
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

                    options: [],
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
                        // console.log(response.data.data);
                        this.product = response.data.data;

                        // add value.value to value-value, value.name to value-name
                        for(let option in this.product.options){
                            for( let value in  this.product.options[option].values){
                                this.product.options[option].values[value]["name"] = this.product.options[option].values[value].value.name;
                                this.product.options[option].values[value]["value"] = this.product.options[option].values[value].value.value;

                            }
                        }

                        this.isSimple = response.data.data.is_simple;

                        let variants = response.data.data.variants;

                        if (variants.length !== 0) {

                            this.productVariant = [];
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
                            });

                            /*for (let variant in variants){
                                for(let option in variants[variant].options){
                                        this.productVariant[variant].options[option]["name"] = variants[variant].options[option].value['name'];
                                        this.productVariant[variant].options[option]["value"] = variants[variant].options[option].value['value'];
                                }
                            }*/

                            this.productVariant.forEach(variant => {
                                variant.options.forEach(option => {
                                    option['name'] = option.value.name;
                                    option['value'] = option.value.value;
                                })
                            })
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
                this.productVariant.forEach(item => {
                    item.options = item.options.map(i => {
                        return i.id;
                    })
                });

                // console.log(this.productVariant)
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
                    name: this.productVariant.length + 1,
                    code: this.productVariant.length + 1,
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

                    options: [],
                })
            },

            createAllVariants() {
                
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