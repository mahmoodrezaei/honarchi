<template>
  <div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
      <div class="m-portlet m-portlet--mobile">
        <div class="col col-lg">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">مدیریت محصولات</h3>
              </div>
            </div>

            <div class="m-portlet__head-tools">
              <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                  <button
                    @click="createModal"
                    data-toggle="modal"
                    class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--air m-btn--pill"
                  >
                    <i class="fa fa-plus"></i>
                  </button>
                </li>
              </ul>
            </div>

            <Modal size="lg" id="product_modal">
              <template #header>
                <h5 class="modal-title" id="exampleModalLabel">ایجاد محصول جدید</h5>
              </template>
              <template #body>
                <form class="m-form">
                  <div class="form-group m-form__group row">
                    <div class="col-6">
                      <input
                        id="name"
                        class="form-control m-input"
                        type="text"
                        placeholder="نام محصول"
                        v-model="item.name"
                      >
                    </div>
                    <div class="col-6">
                      <input
                        id="name"
                        class="form-control m-input"
                        type="text"
                        placeholder="محل تولید"
                        v-model="item.location"
                      >
                    </div>
                  </div>
                  <div class="form-group m-form__group row">
                    <div class="col-6">
                      <model-select
                        placeholder="دسته بندی"
                        :options="options.categories"
                        v-model="item.category_id"
                      ></model-select>
                    </div>

                    <div class="col-6">
                      <model-select
                        placeholder="گالری"
                        :options="options.galleries"
                        v-model="item.gallery_id"
                      ></model-select>
                    </div>
                  </div>
                  <div class="form-group m-form__group row">
                    <div class="col-12">
                      <input
                        id="intro"
                        class="form-control m-input"
                        type="text"
                        placeholder="توضیحات کوتاه"
                        v-model="item.intro"
                      >
                    </div>
                  </div>
                  <div class="form-group m-form__group row">
                    <div class="col-12">
                      <textarea
                        class="form-control m-input m-input--air"
                        id="description"
                        rows="3"
                        style="margin-top: 0px; margin-bottom: 0px; height: 133px;"
                        placeholder="توضیحات"
                        v-model="item.description"
                      ></textarea>
                    </div>
                  </div>

                  <div class="form-group m-form__group row">
                    <div class="col-6">
                      <input
                        id="intro"
                        class="form-control m-input"
                        type="number"
                        placeholder="تعداد موجود در انبار"
                        v-model.number="item.no"
                      >
                    </div>

                    <div class="col-6">
                      <input
                        id="intro"
                        class="form-control m-input"
                        type="number"
                        placeholder="حداقل تعداد فروش عمده"
                        v-model.number="item.major_no"
                      >
                    </div>
                  </div>
                  <div class="form-group m-form__group row">
                    <div class="col-12">
                      <input
                        id="intro"
                        class="form-control m-input"
                        type="number"
                        placeholder="تعداد فروش برای هر ستاره"
                        v-model.number="item.max_purchase_per_rate"
                      >
                    </div>
                  </div>
                  <div class="form-group m-form__group row">
                    <div class="col-6">
                      <input
                        id="intro"
                        class="form-control m-input"
                        type="number"
                        placeholder="قیمت خرید"
                        v-model="item.purchase_price"
                      >
                    </div>

                    <div class="col-6">
                      <input
                        id="intro"
                        class="form-control m-input"
                        type="number"
                        placeholder="قیمت فروش"
                        v-model="item.price"
                      >
                    </div>
                  </div>
                  <div class="form-group m-form__group row">
                    <div class="col-6">
                      <input
                        id="intro"
                        class="form-control m-input"
                        type="number"
                        placeholder="قیمت فروش خاص"
                        v-model="item.special_price"
                      >
                    </div>

                    <div class="col-6">
                      <input
                        id="intro"
                        class="form-control m-input"
                        type="number"
                        placeholder="قیمت فروش عمده"
                        v-model="item.major_price"
                      >
                    </div>
                  </div>

                  <div class="form-group m-form__group row">
                    <div class="col-12">
                      <div
                        style="min-height: 150px; padding: 20px; margin: 10px 0px 30px; border: 4px solid rgb(239, 239, 239);"
                        id="m_blockui_1_content"
                      >
                        <div
                          style="margin: 3px;"
                          v-for="(pic, index) in  item.pics"
                          :key="index"
                          class="product-pic"
                        >
                          <img
                            :src="typeof(pic) == 'object' ? fileToUrl(pic) : pic"
                            width="100"
                            height="100"
                            alt
                          >
                          <div class="edit">
                            <a @click.prevent="deletePic(pic, index)" href="#">
                              <i class="la la-close"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-center col-12">
                      <label for="file-upload" class="btn btn-primary">
                        <i class="fa fa-cloud-upload-alt"></i> آپلود عکس
                      </label>

                      <input
                        type="file"
                        style="display: none;"
                        id="file-upload"
                        ref="file"
                        v-on:change="handleFileUpload()"
                      >
                      ‌
                    </div>
                  </div>
                  <div class="form-group m-form__group row">
                    <div class="col-12">
                      <!-- ////////////// -->
                      <table class="table">
                        <thead>
                          <tr>
                            <td style="width: 44%">
                              <strong>ویژگی</strong>
                            </td>
                            <td style="width: 44%">
                              <strong>مقدار</strong>
                            </td>

                            <td></td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(row, index) in item.features" :key="index">
                            <td>
                              <input
                                class="col-12 form-control m-input"
                                v-show="row.type == 'normal'"
                                placeholder="ویژگی"
                                type="text"
                                v-model="item.features[index]['name']"
                              >

                              <model-select
                                v-show="row.type == 'linked'"
                                placeholder="ویژگی"
                                :options="options.features.features_names"
                                v-model="item.features[index]['name']"
                              ></model-select>
                            </td>
                            <td>
                              <input
                                class="col-12 form-control m-input"
                                v-show="row.type == 'normal'"
                                placeholder="مقدار"
                                type="text"
                                v-model="item.features[index]['value']"
                              >

                              <model-select
                                v-show="row.type == 'linked'"
                                placeholder="مقدار"
                                :options="options.features.features_values.filter(i => i.key_id == item.features[index]['name'])"
                                v-model="item.features[index]['value']"
                              ></model-select>
                            </td>

                            <td>
                              <a @click.prevent="removeElement(index);" style="cursor: pointer">حذف</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="col-12 d-flex justify-content-center">
                        <button
                          type="button"
                          class="col-3 m-1 btn btn-primary"
                          @click.prevent="addRow('linked')"
                        >اضافه کردن ویژگی لینک شده</button>

                        <button
                          type="button"
                          class="col-3 m-1 btn btn-primary"
                          @click.prevent="addRow('normal')"
                        >اضافه کردن ویژگی معمولی</button>
                      </div>

                      <!-- //////////////// -->
                    </div>
                  </div>
                </form>
              </template>
              <template #footer>
                <button
                  v-show="modalType == 'create'"
                  @click="store"
                  data-dismiss="modal"
                  type="submit"
                  class="btn btn-primary"
                >ثبت کن</button>

                <button
                  v-show="modalType == 'edit'"
                  @click="update(item)"
                  data-dismiss="modal"
                  type="submit"
                  class="btn btn-primary"
                >بروزرسانی</button>
              </template>
            </Modal>
          </div>

          <div class="m-portlet__body">
            <!--begin: Search Form-->
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
              <div class="row align-items-center">
                <!-- search section -->
                <div class="col-xl-8 order-2 order-xl-1">
                  <div class="form-group m-form__group row align-items-center">
                    <div class="col-md-4 m--align-right">
                      <div class="m-input-icon m-input-icon--left">
                        <input
                          v-model="search"
                          @input="resetPagination"
                          type="text"
                          class="form-control m-input m-input--solid"
                          placeholder="Search..."
                          id="generalSearch"
                        >
                        <span class="m-input-icon__icon m-input-icon__icon--left">
                          <span>
                            <i class="la la-search"></i>
                          </span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                  <!-- select how many items show in page -->
                  <div class="form-group m-form__group row">
                    <label class="col-9 col-form-label-sm" for="perPage">تعداد رکوردها</label>
                    <div class="col-3">
                      <select
                        v-model="perPage"
                        @change="resetPagination()"
                        id="perPage"
                        class="custom-select custom-select-sm form-control form-control-sm m-input m-datatable__pager-size"
                      >
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                      </select>
                    </div>
                  </div>

                  <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
              </div>
            </div>
            <!--end: Search Form -->
            <!--begin: Datatable -->
            <div
              class="m_datatable m-datatable m-datatable--default m-datatable--loaded"
              id="local_data"
              style
            >
              <data-table
                :columns="columns"
                :sortKey="sortKey"
                :sortOrders="sortOrders"
                @sort="sortBy"
              >
                <tbody style class="m-datatable__body">
                  <tr
                    v-for="product in paginated"
                    :key="product.id"
                    class="m-datatable__row m-datatable__row"
                    style="left: 0px;"
                  >
                    <td class="m-datatable__cell">
                      <span style="width: 110px;">{{product.name}}</span>
                    </td>

                    <td class="m-datatable__cell">
                      <span
                        style="width: 110px;"
                      >{{ product.category ? product.category.name : 'دسته بندی نشده' }}</span>
                    </td>

                    <td class="m-datatable__cell">
                      <span
                        style="width: 110px;"
                      >{{ product.gallery ? product.gallery.gallery_name : 'بدون گالری'}}</span>
                    </td>

                    <!-- <td class="m-datatable__cell">
                      <div style="width: 130px;" class="m-list-badge">
                        <div class="m-list-badge__items">
                          <div
                            v-if="products.filter(item => item.id == product.parent_id)[0]"
                            style="margin: 10px;"
                          >
                            <span
                              class="m-list-badge__item m-list-badge__item--brand"
                            >{{ products.filter(item => item.id == product.parent_id)[0].name }}</span>
                          </div>
                        </div>
                      </div>
                    </td>-->
                    <td class="m-datatable__cell">
                      <span style="width: 110px;">{{product.created_at}}</span>
                    </td>
                    <td class="m-datatable__cell">
                      <span style="overflow: visible; position: relative; width: 110px;">
                        <button
                          @click="editModal(product)"
                          class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                          title="View "
                        >
                          <i class="la la-edit"></i>
                        </button>
                        <button
                          @click="remove(product)"
                          class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                          title="View "
                        >
                          <i class="la la-remove"></i>
                        </button>
                      </span>
                    </td>
                  </tr>
                </tbody>
              </data-table>

              <pagination
                :pagination="pagination"
                :filtered="filteredproducts"
                @prev="--pagination.currentPage"
                @next="++pagination.currentPage"
              ></pagination>
            </div>

            <!--end: Datatable -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import DataTable from "./DataTable";
import Pagination from "./Pagination";
import Modal from "./Modal.vue";
import { ModelSelect } from "vue-search-select";

export default {
  components: { DataTable, Pagination, Modal, ModelSelect },

  data() {
    let sortOrders = {};

    let columns = [
      { label: "نام محصول", name: "product" },
      { label: "دسته بندی", name: "category" },
      { label: "گالری", name: "gallery" },
      { label: "تاریخ ایجاد", name: "created", type: "number" }
    ];

    columns.forEach(column => {
      sortOrders[column.name] = -1;
    });

    return {
      rowType: "",

      imgLoacation: window.origin + "/storage/products/",

      modalType: "create",

      products: [],

      galleries: [],

      categories: [],

      features: { features_names: [], features_values: [] },

      columns,

      sortKey: "product",

      search: "",

      sortOrders: sortOrders,

      item: { name: 0, category_id: 0, gallery_id: 0, features: {} },

      // how many items per page
      perPage: 10,

      pagination: {
        currentPage: 1,
        total: "",
        nextPage: "",
        prevPage: "",
        from: "",
        to: ""
      }
    };
  },

  created() {
    window.pics = [];
    this.getproducts();
    this.getcategories();
    this.getgalleries();
    this.getfeatures();
  },

  methods: {
    addRow(type) {
      this.item.features.push({ type: type });
      var elem = document.createElement("tr");
    },
    removeElement: function(index) {
      this.item.features.splice(index, 1);
    },

    deletePic(pic, index) {
      if (pic instanceof File) {
        this.item.pics.splice(index, 1);

        this.getBase64(pic, function(e) {
          index = window.pics.indexOf(e.target.result);

          window.pics.splice(index, 1);
        });
      } else {
        this.item.pics.splice(index, 1);

        window.pics.push(pic);
      }
    },

    getBase64(file, onLoadCallback) {
      let base64;
      var reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = onLoadCallback;

      reader.onerror = function(error) {
        console.log("Error: ", error);
      };
    },

    fileToUrl(file) {
      return URL.createObjectURL(file);
    },
    handleFileUpload() {
      this.getBase64(this.$refs.file.files[0], function(e) {
        window.pics.push(e.target.result);
      });
      this.item.pics.push(this.$refs.file.files[0]);
    },

    editModal(item) {
      window.pics = [];
      this.item = { ...item };
      $("#product_modal").modal("show");
      this.modalType = "edit";
    },

    createModal(item) {
      window.pics = [];
      this.item = { pics: [], features: [] };
      $("#product_modal").modal("show");
      this.modalType = "create";
    },

    getproducts() {
      axios
        .get("/api/admin/products")
        .then(response => {
          this.products = response.data;
          this.pagination.total = this.products.length;
        })
        .catch(error => console.log(error));
    },

    getcategories() {
      axios
        .get("/api/admin/categories")
        .then(response => {
          this.categories = response.data;
        })
        .catch(error => console.log(error));
    },

    getgalleries() {
      axios
        .get("/api/admin/galleries")
        .then(response => {
          this.galleries = response.data.galleries;
        })
        .catch(error => console.log(error));
    },

    getfeatures() {
      axios
        .get("/api/admin/features")
        .then(response => {
          response.data.forEach(
            function(item) {
              if (item.key_id) {
                this.features["features_values"].push(item);
              } else {
                this.features["features_names"].push(item);
              }
            }.bind(this)
          );
        })
        .catch(error => console.log(error));
    },

    paginate(data, perPage, pageNumber) {
      this.pagination.from = data.length ? (pageNumber - 1) * perPage + 1 : " ";
      this.pagination.to =
        pageNumber * perPage > data.length ? data.length : pageNumber * perPage;
      this.pagination.prevPage = pageNumber > 1 ? pageNumber : "";
      this.pagination.nextPage =
        data.length > this.pagination.to ? pageNumber + 1 : "";
      return data.slice((pageNumber - 1) * perPage, pageNumber * perPage);
    },

    resetPagination() {
      this.pagination.currentPage = 1;
      this.pagination.prevPage = "";
      this.pagination.nextPage = "";
    },

    sortBy(key) {
      this.resetPagination();
      this.sortKey = key;
      this.sortOrders[key] = this.sortOrders[key] * -1;
    },

    getIndex(array, key, value) {
      return array.findIndex(i => i[key] == value);
    },

    store() {
      this.item.pics = window.pics;

      for (let i in this.item.features) {
        i = this.item.features[i];

        if (i["type"] == "linked") {
          for (let feature in this.features.features_values) {
            feature = this.features.features_values[feature];
            if (i["value"] == feature["id"]) {
              this.item.features[this.item.features.indexOf(i)][
                "feature"
              ] = feature;
            }
          }
        }
      }
      console.log(this.item);

      axios
        .post("/api/admin/products", this.item)
        .then(response => {
          this.products.push(response.data);
          this.pagination.total = this.products.length;
          swal({
            type: "success",
            text: "محصول با موفقیت اضافه شد",
            timer: 2500,
            showConfirmButton: false
          });
          console.log(response.data);
        })
        .catch(error => {
          if (error.response.status == 422) {
            error.response.data.errors = Object.values(
              error.response.data.errors
            )
              .map(item => {
                return item
                  .map(i => {
                    return i;
                  })
                  .join("<hr/>");
              })
              .join("<br/>");

            swal({
              html: `
              <h2>داده ها نامعتبر میباشند</h2>
              <p> ${error.response.data.errors} </p>
              `,
              type: "error",

              confirmButtonText:
                "<span><i class='la'></i><span>متوجه شدم</span></span>",
              confirmButtonClass:
                "btn btn-danger m-btn m-btn--pill m-btn--air m-btn--icon"
            });
            console.log(error.response.data);
          }
        });
    },

    update(product) {
      this.item.pics = window.pics;

      for (let i in this.item.features) {
        i = this.item.features[i];

        if (i["type"] == "linked") {
          for (let feature in this.features.features_values) {
            feature = this.features.features_values[feature];
            if (i["value"] == feature["id"]) {
              this.item.features[this.item.features.indexOf(i)][
                "feature"
              ] = feature;
            }
          }
        }
      }
      console.log(this.item);

      const index = this.products.findIndex(item => item.id == product.id);

      axios
        .put("/api/admin/products/" + product.id, this.item)
        .then(response => {
          this.$set(this.products, index, response.data);
          swal({
            type: "success",
            text: "محصول با موفقیت به روز شد",
            timer: 2500,
            showConfirmButton: false
          });
          console.log(this.products);
        })
        .catch(error => {
          if (error.response.status == 422) {
            error.response.data.errors = Object.values(
              error.response.data.errors
            )
              .map(item => {
                return item
                  .map(i => {
                    return i;
                  })
                  .join("<hr/>");
              })
              .join("<br/>");

            swal({
              html: `
              <h2>داده ها نامعتبر میباشند</h2>
              <p> ${error.response.data.errors} </p>
              `,
              type: "error",

              confirmButtonText:
                "<span><i class='la'></i><span>متوجه شدم</span></span>",
              confirmButtonClass:
                "btn btn-danger m-btn m-btn--pill m-btn--air m-btn--icon"
            });
          }
        });
    },

    remove(product) {
      const index = this.products.indexOf(product);
      swal({
        text: "آیا اطمینان دارید که میخواهید این مورد را حذف کنید؟",
        type: "warning",
        confirmButtonText: "<span><i class='la'></i><span>بله</span></span>",
        confirmButtonClass:
          "btn btn-danger m-btn m-btn--pill m-btn--air m-btn--icon",
        showCancelButton: !0,
        cancelButtonText: "<span><i class='la'></i><span>خیر</span></span>",
        cancelButtonClass: "btn btn-secondary m-btn m-btn--pill m-btn--icon"
      }).then(answer => {
        console.log(answer);
        if (answer.value === true) {
          axios
            .delete("/api/admin/products/" + product.id)
            .then(response => {
              this.products.splice(index, 1);
              swal({
                type: "success",
                text: "محصول با موفقیت حذف شد",
                timer: 2500
              });
            })
            .catch(error => {
              if (error.response.status == 500) {
                swal({
                  text: "خطایی رخ داده!",
                  type: "error",

                  confirmButtonText:
                    "<span><i class='la'></i><span>متوجه شدم</span></span>",
                  confirmButtonClass:
                    "btn btn-danger m-btn m-btn--pill m-btn--air m-btn--icon"
                });
              }
            });
        }
      });
    }
  },

  computed: {
    options() {
      let options = {
        categories: [],
        galleries: [],
        features: { features_names: [], features_values: [] }
      };

      // load categories
      if (this.categories.length > 0)
        this.categories.forEach(item => {
          let name = item.name || null;
          let id = item.id || null;
          options.categories.push({ text: name, value: id });
        });

      // load galleries
      if (this.galleries.length > 0)
        this.galleries.forEach(item => {
          let name = item.gallery_name || null;
          let id = item.id || null;
          options.galleries.push({ text: name, value: id });
        });

      // load features.features_names
      if (this.features.features_names.length > 0)
        this.features.features_names.forEach(item => {
          let name = item.name || null;
          let id = item.id || null;
          options.features.features_names.push({
            text: name,
            value: id
          });
        });

      // load features.features_values
      if (this.features.features_values.length > 0)
        this.features.features_values.forEach(item => {
          let name = item.name || null;
          let id = item.id || null;
          let key_id = item.key_id || null;

          options.features.features_values.push({
            key_id: key_id,
            text: name,
            value: id
          });
        });

      return options;
    },

    filteredproducts() {
      let products = this.products;

      if (this.search) {
        products = products.filter(row => {
          return Object.keys(row).some(key => {
            return (
              String(row[key])
                .toLowerCase()
                .indexOf(this.search.toLowerCase()) > -1
            );
          });
        });
      }

      let sortKey = this.sortKey;
      let order = this.sortOrders[sortKey] || 1;
      if (sortKey) {
        products = products.slice().sort((a, b) => {
          let index = this.getIndex(this.columns, "name", sortKey);
          a = String(a[sortKey]).toLowerCase();
          b = String(b[sortKey]).toLowerCase();
          if (this.columns[index].type && this.columns[index].type === "date") {
            return (
              (a === b
                ? 0
                : new Date(a).getTime() > new Date(b).getTime()
                ? 1
                : -1) * order
            );
          } else if (
            this.columns[index].type &&
            this.columns[index].type === "number"
          ) {
            return (+a === +b ? 0 : +a > +b ? 1 : -1) * order;
          } else {
            return (a === b ? 0 : a > b ? 1 : -1) * order;
          }
        });
      }

      return products;
    },

    paginated() {
      return this.paginate(
        this.filteredproducts,
        this.perPage,
        this.pagination.currentPage
      );
    }
  }
};
</script>

<style scoped>
.product-pic {
  position: relative;
  display: inline-block;
}

.product-pic:hover .edit {
  display: block;
}

.edit {
  padding-top: 7px;
  padding-right: 7px;
  position: absolute;
  right: 0;
  top: 0;
  display: none;
}

.edit a {
  color: #000;
}
</style>