<template>
  <div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
      <div class="m-portlet m-portlet--mobile">
        <div class="col col-lg">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">ایجاد دسته بندی جدید</h3>
              </div>
            </div>

            <div class="m-portlet__head-tools">
              <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                  <button
                    @click="$router.push('/admin/categories')"
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
                  <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">نام دسته بندی</label>
                    <div class="col-lg-4">
                      <input
                        @click="errors['name'] = ''"
                        v-model="categoryItem.name"
                        type="text"
                        class="form-control m-input"
                      >
                      <span v-if="!errors.name" class="m-form__help">نام دسته بندی خود را وارد کنید</span>
                      <form-error v-if="errors.name" :errors="errors">{{ errors.name[0] }}</form-error>
                    </div>
                  </div>

                  <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">نامک دسته بندی</label>
                    <div class="col-lg-4">
                      <input
                        @click="errors['slug'] = ''"
                        v-model="categoryItem.slug"
                        type="text"
                        class="form-control m-input"
                      >
                      <span v-if="!errors.slug" class="m-form__help">نامک دسته بندی خود را وارد کنید</span>
                      <form-error v-if="errors.slug" :errors="errors">{{ errors.slug[0] }}</form-error>
                    </div>
                  </div>

                  <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">دسته بندی مادر</label>
                    <div class="col-lg-4">
                      <model-select placeholder :options="options" v-model="categoryItem.parent_id"></model-select>
                      <span class="m-form__help">دسته بندی مادر را برای این دسته بندی انتخاب کنید</span>
                    </div>
                  </div>

                  <hr>

                  <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">توضیحات متا</label>
                    <div class="col-lg-12">
                      <input
                        @click="errors['meta_description'] = ''"
                        v-model="categoryItem.meta_description"
                        type="text"
                        class="form-control m-input"
                      >
                      <span
                        v-if="!errors.meta_description"
                        class="m-form__help"
                      >توضیحات متا (meta description) در این فیلد بنویسید</span>
                      <form-error
                        v-if="errors.meta_description"
                        :errors="errors"
                      >{{ errors.meta_description[0] }}</form-error>
                    </div>
                  </div>

                  <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">کلمات کلیدی</label>
                    <div class="col-lg-12">
                      <input
                        @click="errors['meta_keywords'] = ''"
                        v-model="categoryItem.meta_keywords"
                        type="text"
                        class="form-control m-input"
                      >
                      <span
                        v-if="!errors['meta_keywords']"
                        class="m-form__help"
                      >کلمات کلیدی دسته بندی را وارد کنید</span>
                      <form-error
                        v-if="errors['meta_keywords']"
                        :errors="errors"
                      >{{ errors['meta_keywords'][0] }}</form-error>
                    </div>
                  </div>

                  <!--                                        <div class="m-form__seperator m-form__seperator&#45;&#45;dashed  m-form__seperator&#45;&#45;space m&#45;&#45;margin-bottom-40"></div>-->
                </div>
              </div>

              <div class="m-form__actions m-form__actions">
                <div class="row">
                  <div class="col-lg-4">
                    <button
                      @click.prevent="updateCategoryRequest"
                      type="reset"
                      class="btn btn-success"
                      :class="storeBtnLoaderClasses"
                    >ثبت کردن</button>
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
import { categoriesRoutes } from "../../../lib/apiRoutes";
import FormError from "../../../components/FormError.vue";
import { ModelSelect } from "vue-search-select";

export default {
  name: "categoriesCreate",
  components: {
    FormError,
    ModelSelect
  },

  created() {
    this.retrieveCategories();
    this.showCategoryRequest();
  },

  data() {
    return {
      sending: false,

      categories: [],
      categoryItem: {},
      errors: []
    };
  },

  computed: {
    storeBtnLoaderClasses() {
      return this.sending ? "m-loader m-loader--light m-loader--left" : "";
    },

    options() {
      let options = [];
      if (this.categories.length > 0)
        this.categories.forEach(item => {
          let name = item.name || null;
          let id = item.id || null;
          options.push({ text: name, value: id });
        });
      return options;
    }
  },

  methods: {
    resetData() {
      this.categoryItem = {
        name: "",
        slug: "",
        parent_id: null
      };
    },

    updateCategoryRequest() {
      this.sending = true;
      axios
        .put(
          categoriesRoutes.update.url + this.$route.params.id,
          this.categoryItem
        )
        .then(
          function(response) {
            this.sending = false;
            flash(response.data.message);
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
    },

    showCategoryRequest() {
      return axios
        .get(categoriesRoutes.show.url + this.$route.params.id)
        .then(response => {
          this.categoryItem = response.data.data;
          this.categoryItem['meta_description'] = response.data.data.seo.meta_description;
          this.categoryItem['meta_keywords'] = response.data.data.seo.meta_keywords;
        })
        .catch(errors => {
          this.loading = false;
        });
    },

    retrieveCategories() {
      axios
        .get(categoriesRoutes.index.url)
        .then(response => {
          this.categories = response.data.data;
          this.pagination.total = this.categories.length;
        })
        .catch(error => console.log(error.response));
    }
  }
};
</script>

<style scoped>
</style>


