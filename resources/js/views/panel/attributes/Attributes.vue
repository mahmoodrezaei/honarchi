<template>
  <div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
      <div class="m-portlet m-portlet--mobile">
        <div class="col col-lg">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">گزینه‌های متغیر</h3>
              </div>
            </div>

            <div class="m-portlet__head-tools">
              <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                  <router-link :to="`/admin/attributes/create`">
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
              <!--<div v-show="loading" class="m-loader m-loader&#45;&#45;lg m-loader&#45;&#45;info" style="z-index: 100; position: relative; top: 100px"></div>-->

              <data-table
                :columns="columns"
                :sortKey="sortKey"
                :sortOrders="sortOrders"
                @sort="sortBy"
              >
                <tbody class="m-datatable__body">
                  <tr
                    v-for="attribute in paginated"
                    :key="attribute.id"
                    class="m-datatable__row m-datatable__row"
                    style="left: 0px;"
                  >
                    <td class="m-datatable__cell">
                      <span style="width: 110px;">{{ attribute.name }}</span>
                    </td>
                    <td class="m-datatable__cell">
                      <span style="width: 110px;">{{ attribute.type }}</span>
                    </td>
                    <td class="m-datatable__cell">
                      <span style="width: 110px;">{{attribute.created_at}}</span>
                    </td>
                    <td class="m-datatable__cell">
                      <span style="overflow: visible; position: relative; width: 110px;">
                        <router-link :to="`/admin/attributes/${attribute.id}/edit`">
                          <button
                            class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill"
                            title="نمایش جزییات"
                          >
                            <i class="la la-edit"></i>
                          </button>
                        </router-link>
                        <button
                          class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                          title="حذف"
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
                :filtered="filteredattributes"
                @prev="--pagination.currentPage"
                @next="++pagination.currentPage"
              ></pagination>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import DataTable from "../../../components/DataTable";
import Pagination from "../../../components/Pagination";

export default {
  name: "Attributes",

  components: { DataTable, Pagination },

  data() {
    let sortOrders = {};

    let columns = [
      { label: "ویژگی", name: "attribute" },
      { label: "نوع ویژگی", name: "type" },
      { label: "تاریخ ایجاد", name: "created", type: "number" }
    ];

    columns.forEach(column => {
      sortOrders[column.name] = -1;
    });

    return {
      attributes: [],

      columns,

      sortKey: "attribute",

      search: "",

      sortOrders: sortOrders,

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
    this.retrieveAttributes();
  },

  methods: {
    retrieveAttributes() {
      axios
        .get("/api/admin/attributes")
        .then(response => {
          this.attributes = response.data.data;
          this.pagination.total = this.attributes.length;
        })
        .catch(error => console.log(error.response));
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
    }
  },

  computed: {
    filteredattributes() {
      let attributes = this.attributes;

      if (this.search) {
        attributes = attributes.filter(row => {
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
        attributes = attributes.slice().sort((a, b) => {
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

      return attributes;
    },

    paginated() {
      return this.paginate(
        this.filteredattributes,
        this.perPage,
        this.pagination.currentPage
      );
    }
  }
};
</script>

<style scoped>
</style>