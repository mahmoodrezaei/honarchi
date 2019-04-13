<template>
    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">

        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label for="name">نام محصول:</label>
                <input type="text" id="name" class="form-control m-input" placeholder="">
                <span class="m-form__help">لطقا نام مخصول را وارد کنید</span>
            </div>
            <div class="col-lg-6">
                <label for="sku">کد محصول</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" id="sku" class="form-control m-input" placeholder="">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-barcode"></i></span></span>
                </div>
                <span class="m-form__help">لطفا کد محصول را وارد کنید</span>
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label for="slug">نامک:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" id="slug" class="form-control m-input" placeholder="">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-"></i></span></span>
                </div>
                <span class="m-form__help">لطفا نامک محصول را بدون فاصله وارد کنید</span>
            </div>
            <div class="col-lg-6">
                <label for="location">محل تولید:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" id="location" class="form-control m-input" placeholder="">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-map-marker"></i></span></span>
                </div>
                <span class="m-form__help">لطفا محل تولید محصول را وارد کنید</span>
            </div>
        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="form-group m-form__group row">
            <div class="col-lg-6">

                <label for="gallery">گالری:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" id="gallery" class="form-control m-input" placeholder="">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-"></i></span></span>
                </div>
                <span class="m-form__help">گالری این محصول را مشخص کنید</span>
            </div>
            <div class="col-lg-6">
                <label for="categories">دسته‌بندی:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" id="categories" class="form-control m-input" placeholder="">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-tags"></i></span></span>
                </div>
                <span class="m-form__help">دسته‌بندی این محصول را مشخص کنید</span>
            </div>
        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="short_description">توضیحات کوتاه:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" id="short_description" class="form-control m-input" placeholder="">
                </div>
                <span class="m-form__help">توضیحات کوتاهی درباره این محصول بنویسید</span>
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="description">توضیحات محصول:</label>
                <div class="m-input-icon m-input-icon--right">
                    <textarea id="description" class="form-control m-input" rows="5" placeholder=""></textarea>
                </div>
                <span class="m-form__help">توضیحات محصول را اینجا بنویسید</span>
            </div>
        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label>این محصول فعال باشد:</label>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                    <label>
                        <input type="checkbox" checked="checked" name="">
                        <span></span>
                    </label>
                </span>
            </div>
            <div class="col-lg-6">
                <label for="published_date">دسته‌بندی:</label>
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" id="published_date" class="form-control m-input" placeholder="">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-tags"></i></span></span>
                </div>
                <span class="m-form__help">دسته‌بندی این محصول را مشخص کنید</span>
            </div>
        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="m-form__actions">
            <div class="row">
                <div class="col-lg-6">
                    <button type="reset" class="btn btn-success">ثبت</button>
                </div>
            </div>
        </div>

    </form>
</template>

<script>
    export default {
        name: "ProductDetails"
    }
</script>

<style scoped>

</style>