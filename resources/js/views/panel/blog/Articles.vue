<template>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="col col-lg">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">مقالات وبلاگ</h3>
                            </div>
                        </div>

                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <router-link :to="`/admin/articles/create`">
                                        <button class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--air m-btn--pill">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="m-portlet__body">
                        <!--begin: Search Form-->
                        <!--<div class="m-form m-form&#45;&#45;label-align-right m&#45;&#45;margin-top-20 m&#45;&#45;margin-bottom-30">
                            <div class="row align-items-center">
                                &lt;!&ndash; search section &ndash;&gt;
                                <div class="col-xl-8 order-2 order-xl-1">
                                    <div class="form-group m-form__group row align-items-center">
                                        <div class="col-md-4 m&#45;&#45;align-right">
                                            <div class="m-input-icon m-input-icon&#45;&#45;left">
                                                <input
                                                        v-model="search"
                                                        @input="resetPagination"
                                                        type="text"
                                                        class="form-control m-input m-input&#45;&#45;solid"
                                                        placeholder="Search..."
                                                        id="generalSearch"
                                                >
                                                <span class="m-input-icon__icon m-input-icon__icon&#45;&#45;left">
                          <span>
                            <i class="la la-search"></i>
                          </span>
                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 order-1 order-xl-2 m&#45;&#45;align-right">
                                    &lt;!&ndash; select how many items show in page &ndash;&gt;
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

                                    <div class="m-separator m-separator&#45;&#45;dashed d-xl-none"></div>
                                </div>
                            </div>
                        </div>-->
                        <!--end: Search Form -->
                        <!--begin: Datatable -->
                        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data">
                            <!--<data-table
                                    :columns="columns"
                                    :sortKey="sortKey"
                                    :sortOrders="sortOrders"
                                    @sort="sortBy">
                                <tbody class="m-datatable__body">
                                <tr v-for="product in paginated" :key="product.id" class="m-datatable__row m-datatable__row" style="left: 0px;">

                                    <td class="m-datatable__cell text-center">
                                            <span style="width: 110px;" v-if="product.feature_image">
                                                <img :src="product.feature_image.path" width="100" alt="">
                                            </span>
                                        <span style="width: 110px;" v-else></span>
                                    </td>

                                    <td class="m-datatable__cell text-center">
                                        <span style="width: 110px;">{{product.sku}}</span>
                                    </td>

                                    <td class="m-datatable__cell text-center">
                                        <span style="width: 110px;">{{product.name}}</span>
                                    </td>

                                    <td class="m-datatable__cell text-center">
                                        <span style="width: 110px;" v-if="product.price">{{ product.price.originalPrice }}</span>
                                        <span style="width: 110px;" v-else></span>
                                    </td>

                                    <td class="m-datatable__cell text-center">
                                        <span style="width: 110px;" v-if="product.price">{{ product.price.discountPrice.price }}</span>
                                        <span style="width: 110px;" v-else></span>
                                    </td>

                                    <td class="m-datatable__cell text-center">
                                        <span style="width: 110px;" v-if="product.price">{{ product.price.purchasedPrice }}</span>
                                        <span style="width: 110px;" v-else></span>
                                    </td>

                                    <td class="m-datatable__cell text-center">
                                        <span style="width: 110px;" v-if="product.is_simple">ساده</span>
                                        <span style="width: 110px;" v-else>متغیر</span>
                                    </td>

                                    <td class="m-datatable__cell">
                                            <span style="overflow: visible; position: relative; width: 110px;">
                                                <button @click="remove(product)" class="m-portlet__nav-link btn m-btn m-btn&#45;&#45;hover-danger m-btn&#45;&#45;icon m-btn&#45;&#45;icon-only m-btn&#45;&#45;pill" title="حذف">
                                                  <i class="la la-remove"></i>
                                                </button>

                                                <router-link :to="`/admin/products/${product.id}/edit`">
                                                    <button class="m-portlet__nav-link btn m-btn m-btn&#45;&#45;hover-danger m-btn&#45;&#45;icon m-btn&#45;&#45;icon-only m-btn&#45;&#45;pill" title="ویرایش">
                                                      <i class="la la-edit"></i>
                                                    </button>
                                                </router-link>
                                            </span>
                                    </td>
                                </tr>
                                </tbody>
                            </data-table>-->

                            <!--<pagination
                                    :pagination="pagination"
                                    :filtered="filteredproducts"
                                    @prev="&#45;&#45;pagination.currentPage"
                                    @next="++pagination.currentPage"
                            ></pagination>-->
                        </div>

                        <!--end: Datatable -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import DataTable from '../../../components/DataTable';
    import Pagination from '../../../components/Pagination';

    export default {
        name: "Articles.vue",

        components: { DataTable, Pagination },

        data() {
            let sortOrders = {};

            let columns = [
                { label: "تصویر", name: "image" },
                { label: "عنوان", name: "title" },
                { label: "نامک", name: "slug" },
                { label: "تاریخ انتشار", name: "published_date" },
            ];

            columns.forEach(column => {
                sortOrders[column.name] = -1;
            });

            return {
                articles: [],

                columns,

                sortKey: "title",

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
            }
        },

        mounted() {
            this.getArticles();
        },

        methods: {
            getArticles() {
                axios.get('/api/admin/articles')
                    .then(response => {
                        console.log(response.data)
                    })
                    .catch(errors => {
                        if (errors.message === 'Network Error') {
                            flash('خطایی در اتصال به شبکه رخ داده است', 'warning');
                        } else {
                            console.log(errors.response.data);
                        }
                    });
            }
        },

        computed: {

        }
    }
</script>

<style scoped>

</style>