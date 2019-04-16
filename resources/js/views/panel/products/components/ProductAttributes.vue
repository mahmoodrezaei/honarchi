<template>
    <form class="m-form">
        <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">

                <div class="form-group  m-form__group row">
                        <label class="col-lg-12 col-md-12 col-sm-12 col-form-label">ویژگی‌‌های مورد نظر را انتخاب کنید:</label>
                        <div data-repeater-list="" class="col-lg-12" v-for="(item, index) in items" :key="index">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-md-4">
                                    <div class="m-form__group m-form__group--inline">
                                        <div class="m-form__label">
                                            <label for="attribute-name"></label>
                                        </div>
                                        <div class="m-form__control">
                                            <model-select placeholder="نام ویژگی" :options="attributeSelectBoxValues" v-model="item.selectedAttribute"></model-select>
                                        </div>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>
                                <div class="col-md-4" v-if="item.selectedAttribute.type === 'text'">
                                    <div class="m-form__group m-form__group--inline">
                                        <div class="m-form__label">
                                            <label for="text-value" class="m-label m-label--single"></label>
                                        </div>
                                        <div class="m-form__control">
                                            <input type="text" value="" v-model="item.textValue" id="text-value" class="form-control m-input" placeholder="مقدار ویژگی">
                                        </div>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>

                                <div class="col-md-4" v-else-if="item.selectedAttribute.type === 'select' && item.selectedAttribute.configuration.type === 'choices'">
                                    <div class="m-form__group m-form__group--inline">
                                        <div class="m-form__label">
                                            <label for="single-choice" class="m-label m-label--single"></label>
                                        </div>
                                        <div class="m-form__control">
                                            <model-select placeholder="مقدار ویژگی"
                                                          :options="singleChoiceSelectBoxValues(index)"
                                                          v-model="item.singleChoice"></model-select>
                                        </div>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>

                                <div class="col-md-4" v-else-if="item.selectedAttribute.type === 'select' && item.selectedAttribute.configuration.type === 'multiple'">
                                    <div class="m-form__group m-form__group--inline">
                                        <div class="m-form__label">
                                            <label for="multiple-choice" class="m-label m-label--single"></label>
                                        </div>
                                        <div class="m-form__control">
<!--                                            <input type="text" value="" id="multiple-choice" class="form-control m-input" placeholder="انتخاب چندتایی">-->
                                            <multi-select placeholder="مقادیر ویژگی‌"
                                                          :options="multipleChoiceSelectBoxValues(index)"
                                                          :selected-options="tempMultipleChoices"
                                                          @select="multipleChoicesOnSelect" @change="saveMultipleChoicesToSelectedAttribute(index)"></multi-select>
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
                        <label class="col-form-label"></label>
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


                <div class="m-form__seperator m-form__seperator--dashed  m-form__seperator--space m--margin-bottom-40"></div>
            </div>
        </div>

        <div class="m-form__actions m-form__actions">
            <div class="row">
                <div class="col-lg-4">
                    <button type="button" class="btn btn-success" :class="submitBtnLoaderClasses">ثبت</button>
                    <!--                                            <button type="reset" class="btn btn-secondary">Cancel</button>-->
                </div>
                <div class="col-lg-2">
                </div>
            </div>
        </div>

    </form>
</template>

<script>
    import { ModelSelect, MultiSelect } from 'vue-search-select'

    export default {
        name: "ProductAttributes",

        components: { ModelSelect, MultiSelect },

        data() {
            return {
                attributes: [],

                items:[{
                    selectedAttribute: {},
                    textValue: '',
                    singleChoice: {},
                    multipleChoice: []
                }],

                tempMultipleChoices: []
            }
        },

        created() {
            this.retrieveAttributes();
        },

        methods: {
            retrieveAttributes() {
                axios.get('/api/admin/attributes')
                    .then(response => {
                        this.attributes = response.data.data
                        // console.log(response.data.data)
                    })
                    .catch(errors => console.log(errors.response.data))
            },

            multipleChoicesOnSelect(items, lastSelectItem) {
                this.tempMultipleChoices = items;
            },

            saveMultipleChoicesToSelectedAttribute(index) {
                console.log('data changed');
            },

            addField() {
                this.items.push({
                    selectedAttribute: {},
                    textValue: '',
                    singleChoice: {},
                    multipleChoice: []
                });
            },

            removeField(index) {
                if (this.items.length !== 1) {
                    this.items.splice(index, 1);
                }
            },

            singleChoiceSelectBoxValues(index) {
                let choices = this.items[index].selectedAttribute.configuration.values;

                let temp = [];

                if (choices.length > 0) {
                    choices.forEach(item => {
                        temp.push({
                            text: item.value,
                            value: item.value,
                        })
                    })
                }

                return temp;
            },

            multipleChoiceSelectBoxValues(index) {
                let multipleChoices =
                    this.items[index].selectedAttribute.configuration ?
                        this.items[index].selectedAttribute.configuration.values : [];

                let temp = [];

                if (multipleChoices.length > 0) {
                    multipleChoices.forEach(item => {
                        temp.push({
                            text: item.value,
                            value: item.value,
                        })
                    })
                }

                return temp;
            },
        },

        computed: {
            attributeSelectBoxValues() {
                let attributes = [];

                if (this.attributes.length > 0) {
                    this.attributes.forEach(item => {
                        attributes.push({
                            text: item.name,
                            value: item.id,
                            type: item.type,
                            storageType: item.storage_type,
                            linkable: item.linkable,
                            configuration: item.configuration
                        })
                    })
                }

                return attributes;
            },

            submitBtnLoaderClasses() {

            }
        }
    }
</script>

<style scoped>

</style>