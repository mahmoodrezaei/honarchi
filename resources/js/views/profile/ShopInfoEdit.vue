<template>

    <div class="col-lg-9 col-md-8 mt-2 p-left">
                    <div class="profile-box">
                        <div class="title-products text-right">
                            <h3 class="pro-title fs-18 dastnevis header-gradient d-inline-block pl-4 pl-md-4 pr-2 mb-0 mt-0 pb-2">
                                <router-link to="/profile/shop/info" class="px-2">
                                    <i class="fal fa-arrow-right"></i>
                                </router-link>
                                ویرایش اطلاعات فروشگاه
                            </h3>
                            <hr class="under-title">
                        </div>
                        <div class="pbox bg-ff bx-sh px-3 py-3">
                            <form>
                                <div class="form-group bmd-form-group my-3">
                                    <label class="text-right bmd-label-floating">نام</label>
                                    <input type="name" class="form-control">
                                </div>
                                <div class="form-group bmd-form-group my-3">
                                    <label class="text-right bmd-label-floating">نام خانوادگی</label>
                                    <input type="name" class="form-control">
                                </div>
                                <div class="form-group bmd-form-group my-3">
                                    <label class="text-right bmd-label-floating">کد ملی</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group bmd-form-group my-3">
                                    <label class="text-right bmd-label-floating">شماره کارت</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group bmd-form-group my-3">
                                    <label class="text-right bmd-label-floating">شماره موبایل</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group bmd-form-group my-3">
                                    <label class="text-right bmd-label-floating">پست الکترونیک</label>
                                    <input type="email" class="form-control text-left">
                                </div>
                                <div class="form-check py-2">
                                    <label class="form-check-label">
                                        عضویت در خبرنامه هنرچی
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-sign">
				              <span class="check"></span>
				          </span>
                                    </label>
                                </div>
                                <div class="form-group bmd-form-group my-3">
                                    <label class="text-right bmd-label-floating">محل تولید</label>
                                    <input type="text" class="form-control">
                                    <small class="form-text text-muted">برای مثال : خراسان جنوبی - بیرجند</small>
                                </div>
                                <div class="form-check my-3">
                                    <label class="text-right">نوع دست ساخته</label>
                                    <label class="form-check-label d-block my-3">
                                        سفال
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-sign">
				            <span class="check"></span>
				          </span>
                                    </label>
                                    <label class="form-check-label d-block my-3">
                                        نقاشی
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-sign">
				            <span class="check"></span>
				          </span>
                                    </label>
                                    <label class="form-check-label d-block my-3">
                                        نقاشی
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-sign">
				            <span class="check"></span>
				          </span>
                                    </label>
                                    <label class="form-check-label d-block my-3">
                                        نقاشی
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-sign">
				            <span class="check"></span>
				          </span>
                                    </label>
                                    <label class="form-check-label d-block my-3">
                                        نقاشی
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-sign">
				            <span class="check"></span>
				          </span>
                                    </label>
                                </div>
                                <div class="form-group bmd-form-group my-3">
                                    <label class="text-right">تصاویر نمونه کارها</label>
                                    <br>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 120px; height: 90px;"></div>
                                        <div>
                                            <input type="file" name="...">
                                        </div>
                                    </div>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 120px; height: 90px;"></div>
                                        <div>
                                            <input type="file" name="...">
                                        </div>
                                    </div>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 120px; height: 90px;"></div>
                                        <div>
                                            <input type="file" name="...">
                                        </div>
                                    </div>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 120px; height: 90px;"></div>
                                        <div>
                                            <input type="file" name="...">
                                        </div>
                                    </div>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 120px; height: 90px;"></div>
                                        <div>
                                            <input type="file" name="...">
                                        </div>
                                    </div>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 120px; height: 90px;"></div>
                                        <div>
                                            <input type="file" name="...">
                                        </div>
                                    </div>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 120px; height: 90px;"></div>
                                        <div>
                                            <input type="file" name="...">
                                        </div>
                                    </div>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 120px; height: 90px;"></div>
                                        <div>
                                            <input type="file" name="...">
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">لطفا چند نمونه از تصاویر کارهای خود را برای ما ارسال کنید.</small>
                                </div>
                                <div class="form-group bmd-form-group my-3">
                                    <label class="text-right bmd-label-floating">توضیحات دلخواه</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="form-group bmd-form-group my-2 text-left my-3">
                                    <button type="submit" class="btn pro-frm-btn">ثبت اطلاعات کاربر</button>
                                    <button type="reset" class="btn pro-frm-btn">انصراف</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

</template>

<script>
    export default {
        name: "ShopInfoEdit"
    }
</script>

<style scoped>

</style>