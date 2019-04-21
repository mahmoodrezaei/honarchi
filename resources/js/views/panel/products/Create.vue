<template>
  <div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
      <div class="m-portlet m-portlet--mobile">
        <div class="col col-lg">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">ایجاد محصول جدید</h3>
              </div>
            </div>

            <div class="m-portlet__head-tools">
              <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                  <router-link :to="`/admin/products`">
                    <button
                      class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--air m-btn--pill"
                    >
                      <i class="fa fa-arrow-left"></i>
                    </button>
                  </router-link>
                </li>
              </ul>
            </div>
          </div>

          <div class="m-portlet__body">
            <form
              class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
            >
              <div class="form-group m-form__group row">
                <div class="col-lg-6">
                  <label for="name">نام محصول:</label>
                  <input
                    type="text"
                    v-model="product.name"
                    id="name"
                    class="form-control m-input"
                    placeholder
                  >
                  <span class="m-form__help">لطقا نام مخصول را وارد کنید</span>
                </div>
                <div class="col-lg-6">
                  <label for="sku">کد محصول</label>
                  <div class="m-input-icon m-input-icon--right">
                    <input
                      type="text"
                      v-model="product.sku"
                      id="sku"
                      class="form-control m-input"
                      placeholder
                    >
                    <span class="m-input-icon__icon m-input-icon__icon--right">
                      <span>
                        <i class="la la-barcode"></i>
                      </span>
                    </span>
                  </div>
                  <span class="m-form__help">لطفا کد محصول را وارد کنید</span>
                </div>
              </div>
              <div class="form-group m-form__group row">
                <div class="col-lg-6">
                  <label for="slug">نامک:</label>
                  <div class="m-input-icon m-input-icon--right">
                    <input
                      type="text"
                      v-model="product.slug"
                      id="slug"
                      class="form-control m-input"
                      placeholder
                    >
                    <span class="m-input-icon__icon m-input-icon__icon--right">
                      <span>
                        <i class="la la-"></i>
                      </span>
                    </span>
                  </div>
                  <span class="m-form__help">لطفا نامک محصول را بدون فاصله وارد کنید</span>
                </div>
                <div class="col-lg-6">
                  <label for="location">محل تولید:</label>
                  <div class="m-input-icon m-input-icon--right">
                    <input
                      type="text"
                      v-model="product.location"
                      id="location"
                      class="form-control m-input"
                      placeholder
                    >
                    <span class="m-input-icon__icon m-input-icon__icon--right">
                      <span>
                        <i class="la la-map-marker"></i>
                      </span>
                    </span>
                  </div>
                  <span class="m-form__help">لطفا محل تولید محصول را وارد کنید</span>
                </div>
              </div>

              <div class="m-form__seperator m-form__seperator--dashed"></div>

              <div class="form-group m-form__group row">
                <div class="col-lg-6">
                  <label for="gallery">گالری:</label>
                  <div class="m-input-icon m-input-icon--right">
                    <input type="text" id="gallery" class="form-control m-input" placeholder>
                    <span class="m-input-icon__icon m-input-icon__icon--right">
                      <span>
                        <i class="la la-"></i>
                      </span>
                    </span>
                  </div>
                  <span class="m-form__help">گالری این محصول را مشخص کنید</span>
                </div>
                <div class="col-lg-6">
                  <label for="categories">دسته‌بندی:</label>
                  <div class="m-input-icon m-input-icon--right">
                    <input type="text" id="categories" class="form-control m-input" placeholder>
                    <span class="m-input-icon__icon m-input-icon__icon--right">
                      <span>
                        <i class="la la-tags"></i>
                      </span>
                    </span>
                  </div>
                  <span class="m-form__help">دسته‌بندی این محصول را مشخص کنید</span>
                </div>
              </div>

              <div class="m-form__seperator m-form__seperator--dashed"></div>

              <div class="form-group m-form__group row">
                <div class="col-lg-12">
                  <label for="short_description">توضیحات کوتاه:</label>
                  <div class="m-input-icon m-input-icon--right">
                    <input
                      type="text"
                      v-model="product.short_description"
                      id="short_description"
                      class="form-control m-input"
                      placeholder
                    >
                  </div>
                  <span class="m-form__help">توضیحات کوتاهی درباره این محصول بنویسید</span>
                </div>
              </div>
              <div class="form-group m-form__group row">
                <div class="col-lg-12">
                  <label for="description">توضیحات محصول:</label>
                  <div class="m-input-icon m-input-icon--right">
                    <TinyMCE_Editor id="description" v-model="product.description"/>
                  </div>
                  <span class="m-form__help">توضیحات محصول را اینجا بنویسید</span>
                </div>
              </div>

              <div class="m-form__seperator m-form__seperator--dashed"></div>

              <div class="m-form__group form-group row">
                <div class="col-lg-4">
                  <div class="m-form__group form-group row">
                    <label class="col-form-label">این محصول فعال باشد:</label>
                    <div class="col-4">
                      <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                        <label>
                          <input type="checkbox" v-model="product.enabled" checked="checked" name>
                          <span></span>
                        </label>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label for="max-purchased-per-rate">حداقل تعداد فروش برای هر ستاره:</label>
                  <div class="m-input-icon m-input-icon--right">
                    <input
                      type="text"
                      v-model="product.max_purchase_per_rate"
                      id="max-purchased-per-rate"
                      class="form-control m-input"
                      placeholder
                    >
                  </div>
                  <span class="m-form__help"></span>
                </div>
                <div class="col-lg-4">
                  <label for="published_date">تاریخ انتشار:</label>
                  <div class="input-group date">
                    <input
                      type="text"
                      id="published_date"
                      style="direction: ltr"
                      v-model="product.published_date"
                      class="form-control m-input"
                    >
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="la la-calendar m--font-success"></i>
                      </span>
                    </div>
                    <date-picker v-model="product.published_date" element="published_date"></date-picker>
                  </div>
                  <span class="m-form__help">تاریخ انتشار محصول را مشخص کنید</span>
                </div>
              </div>

              <div class="m-form__seperator m-form__seperator--dashed"></div>

              <div class="form-group m-form__group row">
                <div class="col-lg-12">
                  <label for="meta_description">توضیحات متا:</label>
                  <div class="m-input-icon m-input-icon--right">
                    <input
                      type="text"
                      id="meta_description"
                      class="form-control m-input"
                      placeholder
                    >
                  </div>
                  <span class="m-form__help">توضیحات متا (meta description) در این فیلد بنویسید</span>
                </div>
              </div>

              <div class="m-form__seperator m-form__seperator--dashed"></div>

              <div class="form-group m-form__group row">
                <div class="col-lg-12">
                  <label for="meta_keywords">کلماتت کلیدی:</label>
                  <div class="m-input-icon m-input-icon--right">
                    <input type="text" id="meta_keywords" class="form-control m-input" placeholder>
                  </div>
                  <span class="m-form__help">کلمات کلیدی مخصول را وارد کنید</span>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import VuePersianDatetimePicker from "vue-persian-datetime-picker";
import TinyMCE_Editor from "../../../lib/tinyMCE/tinyMCE.vue";

// config for VuePersianDatetimePicker
Vue.use(VuePersianDatetimePicker, {
  name: "datePicker",
  props: {
    inputFormat: "YYYY-MM-DD HH:mm",
    format: "jYYYY-jMM-jDD HH:mm",
    placeholder: "YYYY-MM-DD HH:mm",
    type: "datetime",
    color: "#34bfa3"
  }
});

export default {
  name: "ProductsCreate",

  components: { VuePersianDatetimePicker, TinyMCE_Editor },

  data() {
    return {
      product: {
        sku: "",
        name: "",
        slug: "",
        location: "",
        short_description: "",
        description: "",
        max_purchase_per_rate: "",
        published_date: "",
        enabled: ""
      },

      selectedGallery: {},
      galleries: []
    };
  },

  methods: {
    getGalleries() {}
  }
};
</script>

<style scoped>
</style>