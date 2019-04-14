<template>
    <form class="m-form m-form--fit m-form--label-align-right">

<!--        <div class="m&#45;&#45;space-15"></div>-->

        <div class="form-group m-form__group row">
            <label class="col-form-label col-lg-3 col-sm-12">Minimum Setup</label>
            <div class="col-lg-4 col-md-9 col-sm-12">
                <input type="text" class="form-control" id="m_datepicker_1" readonly="" placeholder="Select date">
            </div>
        </div>

        <div class="m--space-10"></div>

        <div class="m-form__actions m-form__actions">
            <div class="row">
                <div class="col-lg-9 ml-lg-auto">
                    <button type="reset" class="btn btn-success">ثبت ویژگی‌ها</button>
                </div>
            </div>
        </div>

    </form>
</template>

<script>
    export default {
        name: "ProductAttributes"
    }
</script>

<style scoped>

</style>