<template>
    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">

        <div class="m-form__group form-group row">
            <div class="form-group m-form__group col-md-3 ml-2 mb-2">
                <div style="width: 100%; height: 100%;">
                    <img src="http://via.placeholder.com/300" alt="">
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
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
    export default {
        name: "ProductGallery",

        data() {
            return {
                sending: false,

                errors: ''
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