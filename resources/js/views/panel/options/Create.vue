<template>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="col col-lg">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">ایجاد گزینه جدید</h3>
                            </div>
                        </div>

                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <button @click="$router.push('/admin/options')"
                                            class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--air m-btn--pill">
                                        <i class="fa fa-arrow-left"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="m-portlet__body">
                            <!--begin::Form-->
                            <form class="m-form">
                                <div class="m-portlet__body">
                                    <div class="m-form__section m-form__section--first">
                                        <div class="m-form__group form-group row">
                                            <label class="col-lg-2 col-form-label">نوع گزینه</label>
                                            <div class="col-lg-4">
                                                <div class="m-radio-inline">
                                                    <label class="m-radio">
                                                        <input type="radio" name="type" v-model="newItem.optionType" @change="onOptionTypeChanges" value="text"> متن
                                                        <span></span>
                                                    </label>
                                                    <label class="m-radio">
                                                        <input type="radio" name="type" v-model="newItem.optionType" @change="onOptionTypeChanges" value="color">رنگ
                                                        <span></span>
                                                    </label>
                                                    <label class="m-radio">
                                                        <input type="radio" name="type" v-model="newItem.optionType" @change="onOptionTypeChanges" value="related">وابسته
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <span v-if="!errors.optionType" class="m-form__help">نوع گزینه مورد نظر را انتخاب کنید</span>
                                                <form-error v-if="errors.optionType" :errors="errors">{{ errors.optionType[0] }}</form-error>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="name" class="col-lg-2 col-form-label">نام</label>
                                            <div class="col-lg-4">
                                                <input type="text" id="name" v-model="newItem.name" class="form-control m-input" placeholder="">
                                                <span v-if="!errors.name" class="m-form__help">نام گزینه مورد نظر را وارد کنید:</span>
                                                <form-error v-if="errors.name" :errors="errors">{{ errors.name[0] }}</form-error>
                                            </div>
                                        </div>

                                        <div class="m-form__seperator m-form__seperator--dashed  m-form__seperator--space m--margin-bottom-40"></div>

                                        <div v-show="newItem.optionType === 'text'">
                                            <div class="form-group  m-form__group row">
                                                <label class="col-lg-2 col-form-label">مقادیر</label>
                                                <div data-repeater-list="" class="col-lg-10">
                                                    <div v-for="(item, index) in newItem.values" :key="index" data-repeater-item="" class="form-group m-form__group row align-items-center">
                                                        <div class="col-md-3">
                                                            <div class="m-form__group m-form__group--inline">
                                                                <div class="m-form__label">
                                                                    <label for="textValues"></label>
                                                                </div>
                                                                <div class="m-form__control">
                                                                    <input type="text" v-model="item.value" id="textValues" class="form-control m-input" placeholder="مقدار را وارد کنید">
                                                                </div>
                                                            </div>
                                                            <div class="d-md-none m--margin-bottom-10"></div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div data-repeater-delete="" @click="removeField(index)"
                                                                 class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
																<span>
																	<i class="la la-trash-o"></i>
																	<span>حذف</span>
																</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-form__group form-group row">
                                                <label class="col-lg-2 col-form-label"></label>
                                                <div class="col-lg-4">
                                                    <div data-repeater-create="" @click="addField"
                                                         class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
														<span>
															<i class="la la-plus"></i>
															<span>افزودن</span>
														</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div v-show="newItem.optionType === 'color'">
                                            <div class="form-group  m-form__group row">
                                                <label class="col-lg-2 col-form-label">مقادیر:</label>
                                                <div data-repeater-list="" class="col-lg-10">
                                                    <div data-repeater-item="" v-for="(item, index) in newItem.values" :key="index" class="form-group m-form__group row align-items-center">
                                                        <div class="col-md-3">
                                                            <div class="m-form__group m-form__group--inline">
                                                                <div class="m-form__label">
                                                                    <label for="colorName"></label>
                                                                </div>
                                                                <div class="m-form__control">
                                                                    <input type="text" id="colorName" v-model="item.name" class="form-control m-input" placeholder="نام رنگ">
                                                                </div>
                                                            </div>
                                                            <div class="d-md-none m--margin-bottom-10"></div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="m-form__group m-form__group--inline">
                                                                <div class="m-form__label">
                                                                    <label for="colorValue" class="m-label m-label--single"></label>
                                                                </div>
                                                                <div class="m-form__control">
                                                                    <input type="color" value="" v-model="item.value" id="colorValue" class="form-control m-input" placeholder="رنگ مورد نظر">
                                                                </div>
                                                            </div>
                                                            <div class="d-md-none m--margin-bottom-10"></div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div data-repeater-delete="" @click="removeField(index)"
                                                                 class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
																<span>
																	<i class="la la-trash-o"></i>
																	<span>حذف</span>
																</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-form__group form-group row">
                                                <label class="col-lg-2 col-form-label"></label>
                                                <div class="col-lg-4">
                                                    <div data-repeater-create="" @click="addField"
                                                         class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
														<span>
															<i class="la la-plus"></i>
															<span>افزودن</span>
														</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="m-form__seperator m-form__seperator--dashed  m-form__seperator--space m--margin-bottom-40"></div>
                                    </div>
                                </div>

                                <div class="m-form__actions m-form__actions">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <button type="button" @click="submit" class="btn btn-success" :class="submitBtnLoaderClasses">ثبت</button>
<!--                                            <button type="reset" class="btn btn-secondary">Cancel</button>-->
                                        </div>
                                        <div class="col-lg-2">
                                        </div>
                                    </div>
                                </div>

                            </form>

                            <!--end::Form-->
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {optionRoutes} from '../../../lib/apiRoutes'
    import FormError from '../../../components/FormError'

    export default {
        name: "OptionsCreate",

        components: { FormError },

        data() {
            return {
                newItem: {
                    optionType: 'text',
                    name: '',
                    values: [
                        { name: '', value: ''}
                    ]
                },

                sending: false,

                errors: '',
            }
        },

        methods: {
            addField() {
                this.newItem.values.push({name: '', value: ''});
            },

            removeField(index) {
                if (this.newItem.values.length !== 1) {
                    this.newItem.values.splice(index, 1);
                }
            },

            onOptionTypeChanges() {
                this.newItem.values = [ {name: '', value: ''} ]
            },

            submit() {
                this.sending = true;

                axios.post('/api/admin/options', this.newItem)
                    .then(response => {
                        this.errors = '';
                        this.newItem.optionType = 'text';
                        this.newItem.name = '';
                        this.newItem.values = [{name: '', value: ''}];
                        this.sending = false;
                        flash(response.data.message)
                    })
                    .catch( function(errors) {
                        this.sending = false;

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