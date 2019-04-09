<template>
  <div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
      <div class="m-portlet m-portlet--mobile">
        <div class="col col-lg">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">مدیریت نقش ها</h3>
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

            <Modal id="role_modal">
              <template #header>
                <h5 class="modal-title" id="exampleModalLabel">ایجاد نقش جدید</h5>
              </template>
              <template #body>
                <div class="form-group m-form-group">
                  <input
                    id="name"
                    class="form-control m-input"
                    type="text"
                    placeholder="نام نقش جدید"
                    v-model="item.name"
                  >
                </div>
                <div class="form-group m-form-group">
                  <multi-select
                    placeholder="دسترسی ها"
                    :selected-options="selectedPermissions"
                    @select="permissionOnSelect"
                    :options="options"
                  ></multi-select>
                </div>
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
                    v-for="role in paginated"
                    :key="role.id"
                    class="m-datatable__row m-datatable__row"
                    style="left: 0px;"
                  >
                    <td class="m-datatable__cell">
                      <span style="width: 110px;">{{role.name}}</span>
                    </td>
                    <td class="m-datatable__cell">
                      <div style="width: 110px;" class="m-list-badge">
                        <div class="m-list-badge__items">
                          <div
                            style="margin: 10px;"
                            v-for="permission in role.permissions"
                            :key="permission.id"
                          >
                            <span
                              class="m-list-badge__item m-list-badge__item--brand"
                            >{{permission.name}}</span>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="m-datatable__cell">
                      <span style="width: 110px;">{{role.created_at}}</span>
                    </td>
                    <td class="m-datatable__cell">
                      <span style="overflow: visible; position: relative; width: 110px;">
                        <button
                          @click="editModal(role)"
                          class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                          title="View "
                        >
                          <i class="la la-edit"></i>
                        </button>
                        <button
                          @click="remove(role)"
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
                :filtered="filteredroles"
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
import { MultiSelect } from "vue-search-select";

export default {
  components: { DataTable, Pagination, Modal, MultiSelect },

  data() {
    let sortOrders = {};

    let columns = [
      { label: "نام نقش", name: "role" },
      { label: "دسترسی ها", name: "permissions" },
      { label: "تاریخ ایجاد", name: "created", type: "number" }
    ];

    columns.forEach(column => {
      sortOrders[column.name] = -1;
    });

    return {
      modalType: "create",

      roles: [],

      permissions: [],
      selectedPermissions: [],

      columns,

      sortKey: "role",

      search: "",

      sortOrders: sortOrders,

      item: { name: "", permissions: [] },

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
    this.getroles();
    this.getpermissions();
  },

  methods: {
    editModal(item) {
      this.selectedPermissions = item.permissions.map(x => {
        return { text: x.name, value: x.id };
      });
      this.item = {
        id: item.id,
        name: item.name,
        permissions: this.selectedPermissions.map(x => x.text)
      };
      $("#role_modal").modal("show");
      this.modalType = "edit";
    },

    createModal(item) {
      this.selectedPermissions = [];
      this.item = { name: "", permissions: [] };
      $("#role_modal").modal("show");
      this.modalType = "create";
    },

    getroles() {
      axios
        .get("/api/admin/roles")
        .then(response => {
          this.roles = response.data;
          this.pagination.total = this.roles.length;
        })
        .catch(error => console.log(error));
    },

    getpermissions() {
      axios
        .get("/api/admin/permissions")
        .then(response => {
          this.permissions = response.data;
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
        .post("/api/admin/roles", this.item)
        .then(response => {
          this.roles.push(response.data);
          this.pagination.total = this.roles.length;
          swal({
            type: "success",
            text: "نقش با موفقیت اضافه شد",
            timer: 2500,
            showConfirmButton: false
          });
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

    update(role) {
      const index = this.roles.findIndex(item => item.id == role.id);
      console.log(index);
      axios
        .put("/api/admin/roles/" + role.id, this.item)
        .then(response => {
          this.$set(this.roles, index, response.data);
          swal({
            type: "success",
            text: "نقش به موفقیت به روز شد",
            timer: 2500,
            showConfirmButton: false
          });
          console.log(this.roles);
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

    remove(role) {
      const index = this.roles.indexOf(role);
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
            .delete("/api/admin/roles/" + role.id)
            .then(response => {
              this.roles.splice(index, 1);
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
    },

    permissionOnSelect(items, lastSelectItem) {
      this.selectedPermissions = items;
      this.item.permissions = items.map(item => item.text);
    }
  },

  computed: {
    options() {
      let options = [];

      this.permissions.forEach(item => {
        let name = item.name || null;
        let id = item.id || null;
        options.push({ text: name, value: id });
      });
      return options;
    },

    filteredroles() {
      let roles = this.roles;

      if (this.search) {
        roles = roles.filter(row => {
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
        roles = roles.slice().sort((a, b) => {
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

      return roles;
    },

    paginated() {
      return this.paginate(
        this.filteredroles,
        this.perPage,
        this.pagination.currentPage
      );
    }
  }
};
</script>