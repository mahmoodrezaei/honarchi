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
                <label for="published_date">تاریخ انتشار:</label>
                <multi-select
                        id="published_date"
                        :selected-options="selectedOptions"
                        @select="optionsOnSelect"
                        :options="optionsSelectBoxValues"
                ></multi-select>
                <span class="m-form__help">گزینه‌های محصول متغیر را مشخص کنید</span>
            </div>
        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>


        <div class="m-form__actions">
            <div class="row">
                <div class="col-lg-6">
                    <button type="reset" class="btn btn-success" :class="submitBtnLoaderClasses">ثبت</button>
                </div>
            </div>
        </div>

    </form>
</template>

<script>
    import {MultiSelect} from 'vue-search-select'

    export default {
        name: "ProductOptions",

        components: { MultiSelect },

        data() {
            return {
                isSimple: true,

                options: [],

                selectedOptions: [],
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

            optionsOnSelect(items, lastSelectItem) {
                this.selectedOptions = items;
            }
        },

        computed: {
            optionsSelectBoxValues() {
                let temp = [];

                this.options.forEach(item => {
                    temp.push({text: item.name, value: item.id, id: item.id})
                });

                return temp;
            },

            submitBtnLoaderClasses() {

            }
        }
    }
</script>

<style scoped>

</style>