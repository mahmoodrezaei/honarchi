<template>
  <div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
      <div class="m-portlet m-portlet--mobile">
        <div class="col col-lg">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">مدیریت سطح دسترسی‌ها</h3>
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

            <Modal id="permission_modal">
              <template #header>
                <h5 class="modal-title" id="exampleModalLabel">ایجاد سطح دسترسی جدید</h5>
              </template>
              <template #body>
                <input
                  id="name"
                  class="form-control m-input"
                  type="text"
                  placeholder="نام سطح دسترسی جدید"
                  v-model="item.name"
                >
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
                    v-for="permission in paginated"
                    :key="permission.id"
                    class="m-datatable__row m-datatable__row"
                    style="left: 0px;"
                  >
                    <td class="m-datatable__cell">
                      <span style="width: 110px;">{{permission.name}}</span>
                    </td>
                    <td class="m-datatable__cell">
                      <span style="width: 110px;">{{permission.created_at}}</span>
                    </td>
                    <td class="m-datatable__cell">
                      <span style="overflow: visible; position: relative; width: 110px;">
                        <button
                          @click="editModal(permission)"
                          class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                          title="View "
                        >
                          <i class="la la-edit"></i>
                        </button>
                        <button
                          @click="remove(permission)"
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
                :filtered="filteredpermissions"
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
import DataTable from "../../../components/DataTable";
import Pagination from "../../../components/Pagination";
import Modal from "../../../components/Modal.vue";

export default {
  components: { DataTable, Pagination, Modal },

  data() {
    let sortOrders = {};

    let columns = [
      { label: "نام سطح دسترسی", name: "permission" },
      { label: "تاریخ ایجاد", name: "created", type: "number" }
    ];

    columns.forEach(column => {
      sortOrders[column.name] = -1;
    });

    return {
      modalType: "create",

      permissions: [],

      columns,

      sortKey: "permission",

      search: "",

      sortOrders: sortOrders,

      item: { name: "", parent_id: 0 },

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
    this.getpermissions();
  },

  methods: {
    editModal(item) {
      this.item = { ...item };
      $("#permission_modal").modal("show");
      this.modalType = "edit";
    },

    createModal(item) {
      this.item = { name: "" };
      $("#permission_modal").modal("show");
      this.modalType = "create";
    },

    getpermissions() {
      axios
        .get("/api/admin/permissions")
        .then(response => {
          this.permissions = response.data;
          this.pagination.total = this.permissions.length;
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
      axios
        .post("/api/admin/permissions", this.item)
        .then(response => {
          this.permissions.push(response.data);
          this.pagination.total = this.permissions.length;
          swal({
            type: "success",
            text: "اجازه دسترسی با موفقیت اضافه شد",
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

            console.log(error.response.data);

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

    update(permission) {
      const index = this.permissions.findIndex(
        item => item.id == permission.id
      );

      axios
        .put("/api/admin/permissions/" + permission.id, this.item)
        .then(response => {
          this.$set(this.permissions, index, this.item);
          swal({
            type: "success",
            text: "اجازه دسترسی به موفقیت بروز شد",
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

            console.log(error.response.data);

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

    remove(permission) {
      const index = this.permissions.indexOf(permission);
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
            .delete("/api/admin/permissions/" + permission.id)
            .then(response => {
              this.permissions.splice(index, 1);
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
      let options = [];
      if (this.permissions.length > 0)
        this.permissions.forEach(item => {
          let name = item.name || null;
          let id = item.id || null;
          options.push({ text: name, value: id });
        });
      return options;
    },

    filteredpermissions() {
      let permissions = this.permissions;

      if (this.search) {
        permissions = permissions.filter(row => {
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
        permissions = permissions.slice().sort((a, b) => {
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

      return permissions;
    },

    paginated() {
      return this.paginate(
        this.filteredpermissions,
        this.perPage,
        this.pagination.currentPage
      );
    }
  }
};
</script>