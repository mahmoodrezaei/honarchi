<template>
  <div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
      <div class="m-portlet m-portlet--mobile">
        <div class="col col-lg">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">مدیریت دسته بندی ها</h3>
              </div>
            </div>

            <div class="m-portlet__head-tools">
              <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                  <router-link :to="`/admin/categories/create`">
                    <button
                      class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--air m-btn--pill"
                    >
                      <i class="fa fa-plus"></i>
                    </button>
                  </router-link>
                </li>
              </ul>
            </div>
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
                    v-for="category in paginated"
                    :key="category.id"
                    class="m-datatable__row m-datatable__row"
                    style="left: 0px;"
                  >
                    <td class="m-datatable__cell">
                      <span style="width: 110px;">
                        <strong style="color: #716aca; font-size: 20px;">|</strong>
                        <strong
                          style="color: #716aca; font-size: 20px;"
                          v-for="(index) in category.level"
                          :key="index"
                        >-</strong>
                        {{category.name}}
                      </span>
                    </td>

                    <td class="m-datatable__cell">
                      <div style="width: 130px;" class="m-list-badge">
                        <div class="m-list-badge__items">
                          <div
                            v-if="categories.filter(item => item.id == category.parent_id)[0]"
                            style="margin: 10px;"
                          >
                            <span
                              class="m-list-badge__item m-list-badge__item--brand"
                            >{{ categories.filter(item => item.id == category.parent_id)[0].name }}</span>
                          </div>
                        </div>
                      </div>
                    </td>

                    <td class="m-datatable__cell">
                      <span style="width: 110px;">{{category.created_at}}</span>
                    </td>
                    <td v-show="category.id > 1" class="m-datatable__cell">
                      <span style="overflow: visible; position: relative; width: 110px;">
                        <router-link :to="`/admin/categories/${category.id}/edit`">
                          <button
                            class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                            title="View "
                          >
                            <i class="la la-edit"></i>
                          </button>
                        </router-link>
                        <button
                          @click="remove(category)"
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
                :filtered="filteredcategories"
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
import { categoriesRoutes } from "../../../lib/apiRoutes";
import DataTable from "../../../components/DataTable";
import Pagination from "../../../components/Pagination";

export default {
  components: { DataTable, Pagination },

  data() {
    let sortOrders = {};

    let columns = [
      { label: "نام دسته بندی", name: "category" },
      { label: "دسته بندی مادر", name: "parent" },
      { label: "تاریخ ایجاد", name: "created", type: "number" }
    ];

    columns.forEach(column => {
      sortOrders[column.name] = -1;
    });

    return {
      test: [],
      categories: [],

      columns,

      sortKey: "category",

      search: "",

      sortOrders: sortOrders,

      item: { name: "", slug: "", parent_id: 0 },

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
    this.getcategories();
  },

  methods: {
    getLevel(source, val, level = 0) {
      level++;
      let tmp;

      if (val.parent_id) {
        for (let i in source) {
          if (source[i].id == val.parent_id) tmp = source[i];
        }

        if (tmp) {
          level = this.getLevel(source, tmp, level);
        }
      }
      return level;
    },

    addChildren(source, identifier, dest) {
      source
        .filter(function(val) {
          return val.parent_id == identifier;
        })
        .forEach(
          function(val) {
            val["level"] = this.getLevel(source, val);

            dest.push(val);
            this.addChildren(source, val.id, dest);
          }.bind(this)
        );
    },
    buildTree(source) {
      var dest = [];
      this.addChildren(source, null, dest);
      return dest;
    },

    getcategories() {
      axios
        .get(categoriesRoutes.index.url)
        .then(response => {
          this.categories = this.buildTree(response.data.data);
          this.pagination.total = this.categories.length;
          this.test = this.buildTree(this.categories);
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

    remove(category) {
      const index = this.categories.indexOf(category);
      axios
        .delete(categoriesRoutes.destroy.url + category.id)
        .then(response => {
          this.categories.splice(index, 1);
        })
        .catch(error => {
          console.log(error.response.data);

          flash(error.response.data.errors.id[0], "danger");
        });
    }
  },

  computed: {
    filteredcategories() {
      let categories = this.categories;

      if (this.search) {
        categories = categories.filter(row => {
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
        categories = categories.slice().sort((a, b) => {
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

      return categories;
    },

    paginated() {
      return this.paginate(
        this.filteredcategories,
        this.perPage,
        this.pagination.currentPage
      );
    }
  }
};
</script>