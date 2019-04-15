<template>
    <form class="m-form">
        <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">

                <div class="form-group  m-form__group row">
                        <label class="col-lg-12 col-md-12 col-sm-12 col-form-label">ویژگی‌‌های مورد نظر را انتخاب کنید:</label>
                        <div data-repeater-list="" class="col-lg-12">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-md-4">
                                    <div class="m-form__group m-form__group--inline">
                                        <div class="m-form__label">
                                            <label for="attribute-name"></label>
                                        </div>
                                        <div class="m-form__control">
<!--                                            <input type="text" id="attribute-name" class="form-control m-input" placeholder="نام ویژگی">-->
                                            <model-select placeholder="نام ویژگی" :options="attributeSelectBoxValues" @select="addToSelectedAttributes(item)"></model-select>
                                        </div>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="m-form__group m-form__group--inline">
                                        <div class="m-form__label">
                                            <label for="colorValue" class="m-label m-label--single"></label>
                                        </div>
                                        <div class="m-form__control">
                                            <input type="text" value="" id="colorValue" class="form-control m-input" placeholder="رنگ مورد نظر">
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
    import { ModelSelect } from 'vue-search-select'

    export default {
        name: "ProductAttributes",

        components: { ModelSelect },

        data() {
            return {
                attributes: [],

                selectedAttribute: [],
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

            addToSelectedAttributes(item) {
                this.selectedAttribute.push(item)
            },

            addField() {

            },

            removeField() {

            }
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