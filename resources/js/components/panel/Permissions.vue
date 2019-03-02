<template>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="col col-lg">

                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    مدیریت سطح دسترسی‌ها
                                </h3>
                            </div>
                        </div>

                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <button data-toggle="modal" data-target="#new_permission_modal"
                                            class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--air m-btn--pill">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <!-- Modal form for creating new permission -->
                        <div class="modal fade" id="new_permission_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ایجاد سطح دسترسی جدید</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <!--<form action="/api/permissions" id="new_permission_form" method="POST">-->
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <!--<label for="recipient-name" class="form-control-label"></label>-->
                                            <input v-model="item.name" type="text" placeholder="نام سطح دسترسی جدید"
                                                   class="form-control m-input" id="name">
                                            <!--<div id="name-error" class="form-control-feedback m&#45;&#45;font-info">
                                                این فیلد الزامی است
                                            </div>-->
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">بیخیال</button>-->
                                        <button @click="save" data-dismiss="modal" type="submit" class="btn btn-primary">ثبت کن</button>
                                    </div>
                                    <!--</form>-->
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->

                    </div>

                    <div class="m-portlet__body">

                        <!--begin: Search Form -->
                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                            <div class="row align-items-center">
                                <!-- search section -->
                                <div class="col-xl-8 order-2 order-xl-1">
                                    <div class="form-group m-form__group row align-items-center">
                                        <div class="col-md-4 m--align-right">
                                            <div class="m-input-icon m-input-icon--left">
                                                <input v-model="search" @input="resetPagination" type="text" class="form-control m-input m-input--solid"
                                                       placeholder="Search..." id="generalSearch">
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
                                        <label class="col-9 col-form-label-sm" for="perPage">
                                            تعداد رکوردها
                                        </label>
                                        <div class="col-3">
                                            <select v-model="perPage"
                                                    @change="resetPagination()"
                                                    id="perPage"
                                                    class="custom-select custom-select-sm form-control form-control-sm m-input m-datatable__pager-size">
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
                        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data"
                             style="">

                            <data-table :columns="columns"
                                        :sortKey="sortKey"
                                        :sortOrders="sortOrders"
                                        @sort="sortBy">

                                <tbody style="" class="m-datatable__body">

                                <tr v-for="permission in paginated"
                                    :key="permission.id"
                                    class="m-datatable__row m-datatable__row" style="left: 0px;">
                                    <td class="m-datatable__cell">
                                        <span style="width: 110px;">{{permission.name}}</span>
                                    </td>
                                    <td class="m-datatable__cell">
                                        <span style="width: 110px;">{{permission.created_at}}</span>
                                    </td>
                                    <td class="m-datatable__cell">
                                            <span style="overflow: visible; position: relative; width: 110px;">
                                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
                                                    <i class="la la-edit"></i></a>
                                                <button @click="remove(permission)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
                                                    <i class="la la-remove"></i></button>
                                            </span>
                                    </td>
                                </tr>

                                </tbody>

                            </data-table>

                            <pagination :pagination="pagination" :filtered="filteredPermissions"
                                        @prev="--pagination.currentPage" @next="++pagination.currentPage">
                            </pagination>

                        </div>

                        <!--end: Datatable -->
                    </div>

                </div>
            </div>
        </div>

    </div>
</template>

<script>

    import DataTable from './DataTable'
    import Pagination from './Pagination'

    export default {
        components: { DataTable, Pagination },

        data() {
            let sortOrders = {}

            let columns = [
                {label: 'نام سطح دسترسی', name: 'permission'},
                {label: 'تاریخ ایجاد', name: 'created', type: 'number'},
            ]

            columns.forEach((column) => {
                sortOrders[column.name] = -1
            })

            return {
                permissions: [],

                columns,

                sortKey: 'permission',

                search: '',

                sortOrders: sortOrders,

                item: {name: ''},

                // how many items per page
                perPage: 10,

                pagination: {
                    currentPage: 1,
                    total: '',
                    nextPage: '',
                    prevPage: '',
                    from: '',
                    to: ''
                }
            }
        },

        created() {
            this.getPermissions();
        },

        methods: {
            getPermissions() {
                axios.get('/api/permissions')
                    .then(response => {
                        this.permissions = response.data
                        this.pagination.total = this.permissions.length
                    })
                    .catch(error => console.log(error))
            },

            paginate(data, perPage, pageNumber) {
                this.pagination.from = data.length ? ((pageNumber - 1) * perPage) + 1 : ' ';
                this.pagination.to = pageNumber * perPage > data.length ? data.length : pageNumber * perPage;
                this.pagination.prevPage = pageNumber > 1 ? pageNumber : '';
                this.pagination.nextPage = data.length > this.pagination.to ? pageNumber + 1 : '';
                return data.slice((pageNumber - 1) * perPage, pageNumber * perPage);
            },

            resetPagination() {
                this.pagination.currentPage = 1
                this.pagination.prevPage = ''
                this.pagination.nextPage = ''
            },

            sortBy(key) {
                this.resetPagination()
                this.sortKey = key
                this.sortOrders[key] = this.sortOrders[key] * -1
            },

            getIndex(array, key, value) {
                return array.findIndex(i => i[key] == value)
            },

            save() {
                this.permissions.push(this.item)
                // TODO: here in the axios body you have to empty the body of new permission name
                axios.post('/api/permissions', this.item)
                    .then(response => console.log(response.data))
            },

            remove(permission) {
                const index = this.permissions.indexOf(permission)

                confirm('آیا اطمینان داری، این اجازه دسترسی حذف شود؟') && this.permissions.splice(index, 1)

                axios.delete('/api/permissions/' + permission.id)
                    .then(response => console.log(response.data))
            }
        },

        computed: {
            filteredPermissions() {
                let permissions = this.permissions;

                if (this.search) {
                    permissions = permissions.filter((row) => {
                        return Object.keys(row).some((key) => {
                            return String(row[key]).toLowerCase().indexOf(this.search.toLowerCase()) > -1;
                        })
                    });
                }

                let sortKey = this.sortKey;
                let order = this.sortOrders[sortKey] || 1;
                if (sortKey) {
                    permissions = permissions.slice().sort((a, b) => {
                        let index = this.getIndex(this.columns, 'name', sortKey);
                        a = String(a[sortKey]).toLowerCase();
                        b = String(b[sortKey]).toLowerCase();
                        if (this.columns[index].type && this.columns[index].type === 'date') {
                            return (a === b ? 0 : new Date(a).getTime() > new Date(b).getTime() ? 1 : -1) * order;
                        } else if (this.columns[index].type && this.columns[index].type === 'number') {
                            return (+a === +b ? 0 : +a > +b ? 1 : -1) * order;
                        } else {
                            return (a === b ? 0 : a > b ? 1 : -1) * order;
                        }
                    });
                }

                return permissions
            },

            paginated() {
                return this.paginate(this.filteredPermissions,
                    this.perPage,
                    this.pagination.currentPage)
            }
        }
    }
</script>


<!--&lt;!&ndash;begin: Datatable &ndash;&gt;
                    <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                        &lt;!&ndash; top of the table search and entries &ndash;&gt;
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length"><label>Show <select
                                        class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_filter left"><label>Search:<input type="search"
                                                                                                          class="form-control form-control-sm"
                                                                                                          placeholder=""
                                                                                                          aria-controls="m_table_1"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                        </div>

                        &lt;!&ndash; bottom of tables &ndash;&gt;
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="m_table_1_info" role="status" aria-live="polite">
                                    Showing 1 to 10 of 50 entries
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="m_table_1_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="m_table_1_previous">
                                            <a href="#" aria-controls="m_table_1" data-dt-idx="0" tabindex="0"
                                               class="page-link"><i class="la la-angle-left"></i></a></li>
                                        <li class="paginate_button page-item active"><a href="#"
                                                                                        aria-controls="m_table_1"
                                                                                        data-dt-idx="1" tabindex="0"
                                                                                        class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="m_table_1"
                                                                                  data-dt-idx="2" tabindex="0"
                                                                                  class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="m_table_1"
                                                                                  data-dt-idx="3" tabindex="0"
                                                                                  class="page-link">3</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="m_table_1"
                                                                                  data-dt-idx="4" tabindex="0"
                                                                                  class="page-link">4</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="m_table_1"
                                                                                  data-dt-idx="5" tabindex="0"
                                                                                  class="page-link">5</a></li>
                                        <li class="paginate_button page-item next" id="m_table_1_next"><a href="#"
                                                                                                          aria-controls="m_table_1"
                                                                                                          data-dt-idx="6"
                                                                                                          tabindex="0"
                                                                                                          class="page-link"><i
                                                class="la la-angle-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>-->