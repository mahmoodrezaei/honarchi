<template>
  <form class="m-form">
    <div class="m-portlet__body">
      <div class="m-form__section m-form__section--first">
        <div class="form-group m-form__group row">
          <label
            class="col-lg-12 col-md-12 col-sm-12 col-form-label"
          >ویژگی‌‌های مورد نظر را انتخاب کنید:</label>
          <div data-repeater-list class="col-lg-12" v-for="(item, index) in items" :key="index">
            <div class="form-group m-form__group row align-items-center">
              <div class="col-md-4">
                <div class="m-form__group m-form__group--inline">
                  <div class="m-form__label">
                    <label for="attribute-name"></label>
                  </div>
                  <div class="m-form__control">
                    <multiselect
                      v-model="item.selectedAttribute"
                      placeholder="انتخاب ویژگی"
                      :selectLabel="'انتخاب'"
                      :selectedLabel="'انتخاب شده'"
                      :deselectLabel="'حذف'"
                      label="name"
                      track-by="name"
                      :multiple="false"
                      :options="attributeSelectBoxValues()"
                    ></multiselect>
                  </div>
                </div>
                <div class="d-md-none m--margin-bottom-10"></div>
              </div>
              <div class="col-md-4" v-if="item.selectedAttribute.type === 'متن'">
                <div class="m-form__group m-form__group--inline">
                  <div class="m-form__label">
                    <label for="text-value" class="m-label m-label--single"></label>
                  </div>
                  <div class="m-form__control">
                    <input
                      type="text"
                      value
                      v-model="item.textValue"
                      id="text-value"
                      class="form-control m-input"
                      placeholder="مقدار ویژگی"
                    >
                  </div>
                </div>
                <div class="d-md-none m--margin-bottom-10"></div>
              </div>

              <div
                class="col-md-4"
                v-else-if="item.selectedAttribute.type === 'انتخاب' && item.selectedAttribute.configuration.type === 'choices'"
              >
                <div class="m-form__group m-form__group--inline">
                  <div class="m-form__label">
                    <label for="single-choice" class="m-label m-label--single"></label>
                  </div>
                  <div class="m-form__control">
                    <multiselect
                      v-model="item.singleChoice"
                      placeholder="مقدار ویژگی"
                      :selectLabel="'انتخاب'"
                      :selectedLabel="'انتخاب شده'"
                      :deselectLabel="'حذف'"
                      label="value"
                      track-by="value"
                      :allow-empty="false"
                      :options="singleChoiceSelectBoxValues(index)"
                    ></multiselect>
                  </div>
                </div>
                <div class="d-md-none m--margin-bottom-10"></div>
              </div>

              <div
                class="col-md-4"
                v-else-if="item.selectedAttribute.type === 'انتخاب' && item.selectedAttribute.configuration.type === 'multiple'"
              >
                <div class="m-form__group m-form__group--inline">
                  <div class="m-form__label">
                    <label for="multiple-choice" class="m-label m-label--single"></label>
                  </div>
                  <div class="m-form__control">
                    <multiselect
                      v-model="item.multipleChoice"
                      placeholder="مقادیر ویژگی"
                      :selectLabel="'انتخاب'"
                      :selectedLabel="'انتخاب شده'"
                      :deselectLabel="'حذف'"
                      label="value"
                      track-by="value"
                      :multiple="true"
                      :options="multipleChoiceSelectBoxValues(index)"
                    ></multiselect>
                  </div>
                </div>
                <div class="d-md-none m--margin-bottom-10"></div>
              </div>

              <div class="col-md-4">
                <div
                  data-repeater-delete
                  @click="removeField(index)"
                  class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill"
                >
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
            <div
              data-repeater-create
              @click="addField"
              class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide"
            >
              <span>
                <i class="la la-plus"></i>
                <span>افزودن</span>
              </span>
            </div>
          </div>
        </div>

        <div
          class="m-form__seperator m-form__seperator--dashed m-form__seperator--space m--margin-bottom-40"
        ></div>
      </div>
    </div>

    <div class="m-form__actions m-form__actions">
      <div class="row">
        <div class="col-lg-4">
          <button
            @click="storeAttributeRequest"
            type="button"
            class="btn btn-success"
            :class="submitBtnLoaderClasses"
          >ثبت</button>
          <!--                                            <button type="reset" class="btn btn-secondary">Cancel</button>-->
        </div>
        <div class="col-lg-2"></div>
      </div>
    </div>
  </form>
</template>

<script>
import { productRoutes } from "../../../../lib/apiRoutes";
import Multiselect from "vue-multiselect";

export default {
  name: "ProductAttributes",

  components: { Multiselect },

  data() {
    return {
      attributes: [],

      items: [
        {
          selectedAttribute: {},
          textValue: "",
          singleChoice: {},
          multipleChoice: []
        }
      ],

      tempMultipleChoices: [],

      errors: []
    };
  },

  created() {
    this.retrieveAttributes();
    this.getAttributesRequest();
  },

  methods: {
    retrieveAttributes() {
      axios
        .get("/api/admin/attributes")
        .then(response => {
          this.attributes = response.data.data;
          // console.log(response.data.data)
        })
        .catch(errors => console.log(errors.response.data));
    },

    multipleChoicesOnSelect(items, lastSelectItem) {
      this.tempMultipleChoices = items;
      /*if (this.items[index]) {
                              this.items[index].multipleChoice = items;
                          }*/
    },

    saveMultipleChoicesToSelectedAttribute(index) {
      console.log("data changed");
    },

    addField() {
      this.items.push({
        selectedAttribute: {},
        textValue: "",
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
            value: item.value,
            slug: item.slug,
            code: item.code
          });
        });
      }

      return temp;
    },

    multipleChoiceSelectBoxValues(index) {
      let multipleChoices = this.items[index].selectedAttribute.configuration
        ? this.items[index].selectedAttribute.configuration.values
        : [];

      let temp = [];

      if (multipleChoices.length > 0) {
        multipleChoices.forEach(item => {
          temp.push({
            value: item.value,
            slug: item.slug,
            code: item.code
          });
        });
      }

      return temp;
    },

    attributeSelectBoxValues() {
      let attributes = this.attributes;

      return attributes;
    },

    getAttributesRequest() {
      axios
        .get(productRoutes.attributeRetrieve(this.$route.params.id).url)
        .then(response => {
          let items = [];

          response.data.data.forEach(
            function(i) {
              
              items.push({ selectedAttribute: {}, textValue: "", singleChoice: {}, multipleChoice: [] });

              items[items.length - 1].selectedAttribute = (({ id, name, slug, type, storage_type, configuration, position, linkable, created_at, updated_at }) => ({ id, name, slug, type, storage_type, configuration, position, linkable, created_at, updated_at }))(i);

              if (i.type == "متن")
              {
                items[items.length - 1].textValue = i.pivot.text_value;
              }else if (i.type == "انتخاب")
              {
                if (i.configuration.type == "choices")
                {
                   items[items.length - 1].singleChoice =  items[items.length - 1].selectedAttribute.configuration.values.find(m => m.code == i.pivot.json_value[0])
                }else if (i.configuration.type == "multiple")
                {
                 
                 
                  items[items.length - 1].multipleChoice =  items[items.length - 1].selectedAttribute.configuration.values.filter(m => {
                    let result = false;
                     i.pivot.json_value.find(o => {
                        result =  m.code == o;
                        if(result)
                          return true;
                      });
                      return result;
                    });
                }
              }
            }.bind(this)
          );

          this.items = items;
        })
        .catch();
    },

    storeAttributeRequest() {
      this.sending = true;
      axios
        .post(
          productRoutes.attributeStore(this.$route.params.id).url,
          this.items
        )
        .then(
          function(response) {
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
    }
  },

  computed: {
    submitBtnLoaderClasses() {}
  }
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style scoped>
</style>