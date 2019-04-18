<template>
  <div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
      <div class="m-portlet m-portlet--mobile">
        <div class="col col-lg">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">ایجاد ویژگی جدید</h3>
              </div>
            </div>

            <div class="m-portlet__head-tools">
              <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                  <button
                    @click="$router.push('/admin/attributes')"
                    class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--air m-btn--pill"
                  >
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
                    <label class="col-lg-2 col-form-label">نوع ویژگی</label>
                    <div class="col-lg-4">
                      <div class="m-radio-inline">
                        <label class="m-radio">
                          <input
                            v-model="attributeItem.type"
                            @change="attributeItemTypeChenge()"
                            type="radio"
                            name="example_8"
                            value="متن"
                          >متن
                          <span></span>
                        </label>
                        <label class="m-radio">
                          <input
                            v-model="attributeItem.type"
                            @change="attributeItemTypeChenge()"
                            type="radio"
                            name="example_8"
                            value="انتخاب"
                          >انتخاب
                          <span></span>
                        </label>
                      </div>
                      <span class="m-form__help">نوع ویژگی مورد نظر را انتخاب کنید</span>
                    </div>
                  </div>
                  <div class="m-form__group form-group row">
                    <label class="col-lg-2 col-form-label">لینک شدن</label>
                    <div class="col-lg-4">
                      <label class="m-checkbox">
                        <input
                          v-model="attributeItem.linkable"
                          @change="attributeItemLinkabelChenge()"
                          type="checkbox"
                        >
                        <span style="transform: rotate(90deg);">‌</span>
                      </label>

                      <span class="m-form__help">ویژگی قابلیت لینک شدن را داشته باشد</span>
                    </div>
                  </div>

                  <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">نام ویژگی</label>
                    <div class="col-lg-4">
                      <input
                        @click="errors['name'] = ''"
                        v-model="attributeItem.name"
                        type="text"
                        class="form-control m-input"
                      >
                      <span v-if="!errors.name" class="m-form__help">نام ویژگی خود را وارد کنید</span>
                      <form-error v-if="errors.name" :errors="errors">{{ errors.name[0] }}</form-error>
                    </div>
                  </div>

                  <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">نامک ویژگی</label>
                    <div class="col-lg-4">
                      <input
                        @click="errors['slug'] = ''"
                        v-model="attributeItem.slug"
                        type="text"
                        class="form-control m-input"
                        :disabled="!attributeItem.linkable"
                      >
                      <span v-if="!errors.slug" class="m-form__help">نامک ویژگی خود را وارد کنید</span>
                      <form-error v-if="errors.slug" :errors="errors">{{ errors.slug[0] }}</form-error>
                    </div>
                  </div>

                  <div v-show="attributeItem.type == 'انتخاب'">
                    <div
                      class="m-form__seperator m-form__seperator&#45;&#45;dashed m-form__seperator&#45;&#45;space m&#45;&#45;margin-bottom-40"
                    ></div>
                    <form class="m-form">
                      <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                          <div class="m-form__group form-group row">
                            <label class="col-lg-2 col-form-label">شیوه انتخاب</label>
                            <div class="col-lg-4">
                              <div class="m-radio-inline">
                                <label class="m-radio">
                                  <input
                                    v-model="attributeItem.configuration.type"
                                    type="radio"
                                    name="example_8"
                                    value="choices"
                                  >تکی
                                  <span></span>
                                </label>
                                <label class="m-radio">
                                  <input
                                    v-model="attributeItem.configuration.type"
                                    type="radio"
                                    name="example_8"
                                    value="multiple"
                                  >چندتایی
                                  <span></span>
                                </label>
                              </div>
                              <span class="m-form__help">شیوه انتخاب مقادیر ویژگی را مشخص کنید</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <table class="table">
                      <thead>
                        <tr>
                          <td style="width: 44%">
                            <label class="col-lg-2 col-form-label">مقادیر ویژگی</label>
                          </td>
                          <td style="width: 44%"></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr
                          v-for="(value ,index) in attributeItem.configuration.values"
                          :key="index"
                        >
                          <td>
                            <div>
                              <input
                                v-model="attributeItem.configuration.values[index]['value']"
                                type="text"
                                class="form-control m-input"
                              >
                              <span class="m-form__help">مقدار ویژگی خود را وارد کنید</span>
                            </div>
                          </td>

                          <td>
                            <div>
                              <input
                                v-model="attributeItem.configuration.values[index]['slug']"
                                type="text"
                                class="form-control m-input"
                                :disabled="!attributeItem.linkable"
                              >
                              <span class="m-form__help">نامک این مقدار را وارد کنید</span>
                            </div>
                          </td>

                          <td>
                            <div
                              v-show="attributeItem.configuration.values.length > 1"
                              @click.prevent="removeAttributeValueRow(index)"
                              data-repeater-delete
                              class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill"
                            >
                              <span>
                                <i class="la la-trash-o"></i>
                                <span>حذف</span>
                              </span>
                            </div>
                          </td>
                          <td>
                            <div
                              v-show="index == attributeItem.configuration.values.length-1"
                              @click.prevent="addAttributeValueRow(index)"
                              data-repeater-create
                              class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide"
                            >
                              <span>
                                <i class="la la-plus"></i>
                                <span>اضافه کردن</span>
                              </span>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    <div
                      class="m-form__seperator m-form__seperator&#45;&#45;dashed m-form__seperator&#45;&#45;space m&#45;&#45;margin-bottom-40"
                    ></div>
                  </div>

                  <!--                                        <div class="m-form__seperator m-form__seperator&#45;&#45;dashed  m-form__seperator&#45;&#45;space m&#45;&#45;margin-bottom-40"></div>-->
                </div>
              </div>

              <div class="m-form__actions m-form__actions">
                <div class="row">
                  <div class="col-lg-4">
                    <button
                      @click.prevent="storeAttributeRequest"
                      type="reset"
                      class="btn btn-success"
                      :class="storeBtnLoaderClasses"
                    >ثبت کردن</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                  </div>
                  <div class="col-lg-2"></div>
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
import { attributesRoutes } from "../../../lib/apiRoutes";
import FormError from "../../../components/FormError.vue";

export default {
  name: "AttributesCreate",
  components: {
    FormError
  },

  created() {
    this.resetData();
  },

  data() {
    return {
      sending: false,

      attributeItem: {},
      errors: []
    };
  },

  computed: {
    storeBtnLoaderClasses() {
      return this.sending ? "m-loader m-loader--light m-loader--left" : "";
    }
  },

  methods: {
    resetData() {
      this.attributeItem = {
        name: "",
        type: "متن",
        configuration: {},
        linkable: false
      };
    },

    addAttributeValueRow(index) {
      this.attributeItem.configuration.values.splice(index + 1, 0, {});
    },

    removeAttributeValueRow(index) {
      this.attributeItem.configuration.values.splice(index, 1);
    },

    attributeItemTypeChenge() {
      switch (this.attributeItem.type) {
        case "متن":
          this.attributeItem.type = "متن";
          this.attributeItem.configuration = {};
          break;
        case "انتخاب":
          this.attributeItem.type = "انتخاب";
          this.attributeItem.configuration = { type: "choices", values: [{}] };
      }
    },
    attributeItemLinkabelChenge() {
      if (!this.attributeItem.linkable) {
        delete this.attributeItem["slug"];
        if (this.attributeItem.type == "انتخاب")
          this.attributeItem.configuration.values.map(item => {
            delete item["slug"];
          });
      }
    },

    storeAttributeRequest() {
      this.sending = true;
      axios
        .post(attributesRoutes.store.url, this.attributeItem)
        .then(
          function(response) {
            this.sending = false;
            flash(response.data.message);
            this.resetData();
          }.bind(this)
        )
        .catch(
          function(errors) {
            console.log(errors.response.data.errors);

            if (errors.message == "Network Error") {
              this.sending = false;
              flash("خطایی در اتصال به شبکه رخ داده است.", "warning");
            } else
              switch (errors.response.status) {
                case 422:
                  this.sending = false;
                  this.errors = errors.response.data.errors;
                  break;
              }
          }.bind(this)
        );
    }
  }
};
</script>

<style scoped>
</style>


