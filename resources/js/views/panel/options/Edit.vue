<template>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="col col-lg">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">ویرایش</h3>
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

                        <div v-show="loading" class="m-loader m-loader--lg m-loader--info mt-5"></div>

                        <!--begin::Form-->
                        <form v-show="!loading" class="m-form">
                            <div class="m-portlet__body">
                                <div class="m-form__section m-form__section--first">
                                    <div class="m-form__group form-group row">
                                        <label class="col-lg-2 col-form-label">نوع گزینه</label>
                                        <div class="col-lg-4">
                                            <div class="m-radio-inline">
                                                <label class="m-radio">
                                                    <input type="radio" disabled="disabled" name="type" v-model="editItem.optionType" value="text"> متن
                                                    <span></span>
                                                </label>
                                                <label class="m-radio">
                                                    <input type="radio" disabled="disabled" name="type" v-model="editItem.optionType" value="color">رنگ
                                                    <span></span>
                                                </label>
                                                <label class="m-radio">
                                                    <input type="radio" disabled="disabled" name="type" v-model="editItem.optionType" value="related">وابسته
                                                    <span></span>
                                                </label>
                                            </div>
                                            <span class="m-form__help">نوع گزینه مورد نظر را انتخاب کنید</span>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="name" class="col-lg-2 col-form-label">نام</label>
                                        <div class="col-lg-4">
                                            <input type="text" id="name" v-model="editItem.name" class="form-control m-input" placeholder="">
                                            <span v-if="!errors.name" class="m-form__help">نام گزینه مورد نظر را وارد کنید:</span>
                                            <form-error v-if="errors.name" :errors="errors">{{ errors.name[0] }}</form-error>
                                        </div>
                                    </div>

                                    <div class="m-form__seperator m-form__seperator--dashed  m-form__seperator--space m--margin-bottom-40"></div>

                                    <div v-show="editItem.optionType === 'text'">
                                        <div class="form-group  m-form__group row">
                                            <label class="col-lg-2 col-form-label">مقادیر</label>
                                            <div data-repeater-list="" class="col-lg-10">
                                                <div v-for="(item, index) in editItem.values" :key="index" data-repeater-item="" class="form-group m-form__group row align-items-center">
                                                    <div class="col-md-3">
                                                        <div class="m-form__group m-form__group--inline">
                                                            <div class="m-form__label">
                                                                <label for="textValues"></label>
                                                            </div>
                                                            <div class="m-form__control">
                                                                <input type="text" v-model="item.value.value" id="textValues" class="form-control m-input" placeholder="مقدار را وارد کنید">
                                                            </div>
                                                        </div>
                                                        <div class="d-md-none m--margin-bottom-10"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div v-show="!(typeof item.id === 'number')" data-repeater-delete="" @click="removeField(index)"
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

                                    <div v-show="editItem.optionType === 'color'">
                                        <div class="form-group  m-form__group row">
                                            <label class="col-lg-2 col-form-label">مقادیر:</label>
                                            <div data-repeater-list="" class="col-lg-10">
                                                <div data-repeater-item="" v-for="(item, index) in editItem.values" :key="index" class="form-group m-form__group row align-items-center">
                                                    <div class="col-md-3">
                                                        <div class="m-form__group m-form__group--inline">
                                                            <div class="m-form__label">
                                                                <label for="colorName"></label>
                                                            </div>
                                                            <div class="m-form__control">
                                                                <input type="text" id="colorName" v-model="item.value.name" class="form-control m-input" placeholder="نام رنگ">
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
                                                                <input type="color" value="" v-model="item.value.value" id="colorValue" class="form-control m-input" placeholder="رنگ مورد نظر">
                                                            </div>
                                                        </div>
                                                        <div class="d-md-none m--margin-bottom-10"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div v-show="!(typeof item.id === 'number')" data-repeater-delete="" @click="removeField(index)"
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
                                        <button type="button" @click="updateOption" class="btn m-btn btn-success m-btn--custom" :class="updateBtnLoaderClasses">بروزرسانی</button>
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
    import FormError from "../../../components/FormError";

    export default {
        name: "OptionsEdit",

        components: {FormError},

        data() {
            return {
                id: this.$route.params.id,

                loading: true,
                sending: false,

                editItem: {
                    optionType: '',
                    name: '',
                    values: [
                        {
                            id: '',
                            value: { name: '', value: ''}
                        }
                    ]
                },

                serverValues: [],

                errors: '',
            }
        },

        created() {
            this.retrieveOption();
        },

        methods: {

            retrieveOption() {
                axios.get(`/api/admin/options/${this.id}/show`)
                    .then(response => {
                        this.initEditItem(response);
                        this.loading = false
                    })
                    .catch(errors => {
                        if (errors.message === 'Network Error') {
                            this.loading = false;
                            flash('خطایی در اتصال به شبکه رخ داده است', 'warning');
                        } else {
                            this.loading = false;
                            console.log(error.response.data);
                        }
                    });
                    /*.catch(error => {

                    });*/
            },

            updateOption() {
                this.sending = true;
                axios.put(`/api/admin/options/${this.id}/update`, this.editItem)
                    .then(response => {
                        this.initEditItem(response);
                        this.sending = false;
                        flash(response.data.message)
                    })
                    .catch( function(errors) {
                        if (errors.message === 'Network Error') {
                            this.sending = false;
                            flash('خطایی در اتصال به شبکه رخ داده است', 'warning');
                        } else {
                            switch (errors.response.status) {
                                case 422:
                                    this.errors = errors.response.data.errors;
                                    this.loading = false;
                                    this.sending = false;
                                    break;
                                case 500:
                                    break;
                                default:
                                    console.log(errors.response.data);
                            }
                        }
                    }.bind(this));
            },

            initEditItem(response) {
                this.editItem.values = [];
                this.errors = '';
                this.editItem.optionType = response.data.option.type;
                this.editItem.name = response.data.option.name;
                for (let index = 0; index < response.data.values.length; index++) {
                    this.editItem.values.push({
                        id: response.data.values[index].id,
                        value: {
                            name: response.data.values[index].value.name,
                            value: response.data.values[index].value.value
                        }
                    });
                }
            },

            addField() {
                this.editItem.values.push({
                    id: '',
                    value: {name: '', value: ''}
                });
            },

            removeField(index) {
                this.editItem.values.splice(index, 1);
            },
        },

        computed: {
            updateBtnLoaderClasses() {
                return this.sending ? 'm-loader m-loader--light m-loader--left' : '';
            },
        }
    }
</script>

<style scoped>

</style>