<template>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="col col-lg">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">گالری‌ها</h3>
                            </div>
                        </div>

                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <button @click="showCreateModal()"
                                            data-toggle="modal"
                                            class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--air m-btn--pill">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <!-- modal for creating new gallery -->
                        <Modal id="create_gallery_modal">
                            <template #header>
                                <h5 class="modal-title" id="exampleModalLabel">ایجاد گالری جدید</h5>
                            </template>
                            <template #body>
                                <div class="form-group m-form__group">
                                    <input id="gallery_name" class="form-control m-input" type="text"
                                           placeholder="نام گالری جدید"
                                           v-model="newItem.gallery_name">
                                </div>
                                <div class="form-group m-form__group">
                                    <input id="location" class="form-control m-input" type="text"
                                           placeholder="محل تولید"
                                           v-model="newItem.location">
                                </div>
                                <div class="form-group m-form__group">
                                    <multi-select
                                            placeholder="نوع دست ساخته"
                                            :selected-options="selectedTypes"
                                            @select="onSelectedTypes"
                                            :options="typeOptions"
                                    ></multi-select>
                                </div>
                            </template>
                            <template #footer>
                                <button
                                        @click="store"
                                        data-dismiss="modal"
                                        type="submit"
                                        class="btn btn-primary">
                                    ثبت
                                </button>
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
                                                <span class="m-input-icon__icon m-input-icon__icon--left"><span>
                                                    <i class="la la-search"></i></span>
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
                        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded"
                             id="local_data"
                             style>
                            <data-table
                                    :columns="columns"
                                    :sortKey="sortKey"
                                    :sortOrders="sortOrders"
                                    @sort="sortBy">
                                <tbody class="m-datatable__body">
                                <tr v-for="gallery in paginated"
                                    :key="gallery.id"
                                    class="m-datatable__row m-datatable__row"
                                    style="left: 0px;">
                                    <td class="m-datatable__cell">
                                        <span style="width: 110px;">{{ gallery.gallery_name }}</span>
                                    </td>
                                    <td class="m-datatable__cell">
                                        <div style="width: 110px;">
                                            {{ gallery.location }}
                                        </div>
                                    </td>
                                    <td class="m-datatable__cell">
                                        <div style="width: 110px;">
                                            <span v-if="gallery.state === 'مسدود' "
                                                  class="m-badge m-badge--danger m-badge--wide">{{ gallery.state }}</span>
                                            <span v-else-if="gallery.state === 'تایید نشده' "
                                                  class="m-badge m-badge--warning m-badge--wide">{{ gallery.state }}</span>
                                            <span v-else-if="gallery.state === 'تایید شده' "
                                                  class="m-badge m-badge--success m-badge--wide">{{ gallery.state }}</span>
                                        </div>
                                    </td>
                                    <td class="m-datatable__cell">
                                        <span style="width: 110px;">{{gallery.created_at}}</span>
                                    </td>
                                    <td class="m-datatable__cell">
                                                <span style="overflow: visible; position: relative; width: 110px;">
                                                    <button
                                                            @click="showDetailModal(gallery)"
                                                            class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill"
                                                            title="نمایش جزییات"><i class="la la-edit"></i>
                                                    </button>
                                                    <button
                                                            @click="approve(gallery)"
                                                            v-show="gallery.state === 'تایید نشده'"
                                                            class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill"
                                                            title="تایید"><i class="la la-check-circle"></i>
                                                    </button>
                                                    <button
                                                            v-show="gallery.state === 'تایید شده'"
                                                            @click="block(gallery)"
                                                            class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                                            title="مسدود"><i class="fa fa-lock"></i>
                                                    </button>
                                                    <button
                                                            v-show="gallery.state === 'مسدود'"
                                                            @click="unblock(gallery)"
                                                            class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill"
                                                            title="باز کردن"><i class="fa fa-lock-open"></i>
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

                    <!-- modal for creating new gallery -->
                    <Modal id="gallery_detail_modal">
                        <template #header>
                            <h5 class="modal-title" id="exampleModalLabel2">ایجاد گالری جدید</h5>
                        </template>
                        <template #body>
                            <div class="form-group m-form__group">
                                <input name="gallery_name" class="form-control m-input" type="text"
                                       placeholder="نام گالری جدید"
                                       v-model="newItem.gallery_name">
                            </div>
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="text"
                                       name="location"
                                       placeholder="محل تولید"
                                       v-model="newItem.location">
                            </div>
                            <div class="form-group m-form__group">
                                <multi-select
                                        placeholder="نوع دست ساخته"
                                        :selected-options="selectedTypes"
                                        @select="onSelectedTypes"
                                        :options="typeOptions"
                                ></multi-select>
                            </div>
                        </template>
                        <template #footer>
                            <button
                                    @click="update(newItem)"
                                    data-dismiss="modal"
                                    type="submit"
                                    class="btn btn-primary">
                                بروزرسانی
                            </button>
                        </template>
                    </Modal>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import DataTable from '../../../components/DataTable';
    import Pagination from '../../../components/Pagination';
    import Modal from '../../../components/Modal'
    import {MultiSelect} from 'vue-search-select'

    export default {
        components: {DataTable, Pagination, Modal, MultiSelect},

        data() {
            let sortOrders = {};

            let columns = [
                {label: "گالری", name: "gallery_name"},
                {label: "محل تولید", name: "location"},
                {label: "وضعیت", name: "state"},
                {label: "تاریخ ایجاد", name: "created", type: "number"}
            ];

            columns.forEach(column => {
                sortOrders[column.name] = -1;
            });

            let typeOptions = [
                {text: 'چوب', value: 'چوب'},
                {text: 'چرم', value: 'چرم'},
                {text: 'سفال', value: 'سفال'},
                {text: 'سرامیک', value: 'سرامیک'},
                {text: 'منسوجات و بافته‌ها', value: 'منسوجات و بافته‌ها'},
                {text: 'طراحی و نقاشی', value: 'طراحی و نقاشی'},
                {text: 'سایر', value: 'سایر'}
            ];

            return {
                galleries: [],

                typeOptions: typeOptions,

                selectedTypes: [],

                columns,

                sortKey: "gallery_name",

                search: "",

                newItem: {
                    owner_id: '',
                    gallery_name: '',
                    location: '',
                    type: [],
                    state: '',
                    created_at: ''
                },

                sortOrders: sortOrders,

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
            this.getGalleries();
        },

        methods: {

            showCreateModal() {
                this.newItem = {
                    id: '',
                    owner_id: '',
                    gallery_name: '',
                    location: '',
                    type: [],
                    state: '',
                    created_at: ''
                };

                this.selectedTypes = [];

                $('#create_gallery_modal').modal('show')
            },

            showDetailModal(gallery) {
                $('#gallery_detail_modal').modal('show');

                this.selectedTypes = gallery.type.map(item => {
                    return {text: item, value: item}
                });

                this.newItem = {
                    id: gallery.id,
                    owner_id: '',
                    gallery_name: gallery.gallery_name,
                    location: gallery.location,
                    type: this.selectedTypes.map(item => item.text)
                };
            },

            onSelectedTypes(items, lastSelectItem) {
                this.selectedTypes = items;
                this.newItem.type = items.map(item => item.text);
                console.log(this.newItem)
            },

            store() {
                axios.post('/api/admin/galleries', this.newItem)
                    .then(response => {
                        if (response.data.status_code === 201) {
                            swal({type: 'success', text: response.data.message, timer: 2500});

                            this.newItem = {
                                gallery_name: response.data.gallery.gallery_name,
                                location: response.data.gallery.location,
                                state: response.data.gallery.state,
                                created_at: response.data.gallery.created_at
                            };

                            this.galleries.push(this.newItem);
                            this.pagination.total = this.galleries.length;
                        }
                    })
                    .catch(error => {
                        if (error.response.status === 422) {
                            const errors = error.response.data.errors;

                            console.log(Object.keys(errors));

                            // errors.forEach((key, value) => console.log(value));
                            swal({
                                html: '<p v-for="item in Object.keys(errors)">{{ errors[item] }}</p>',
                                type: 'error',
                                timer: 3000,
                            });
                        }
                    })
            },

            update(gallery) {

                const index = this.galleries.findIndex(item => item.id === gallery.id);

                console.log(gallery);
                console.log('index: ' + index)

                axios.patch(`/api/admin/galleries/${gallery.id}`, this.newItem)
                    .then(response => {
                        if (response.data.status_code === 200) {
                            swal({type: 'success', text: response.data.message, timer: 2500});
                            this.newItem = {
                                gallery_name: response.data.gallery.gallery_name,
                                location: response.data.gallery.location,
                                state: response.data.gallery.state,
                                created_at: response.data.gallery.created_at,
                            };

                            this.$set(this.galleries, index, this.newItem)
                        }
                    })
                    .catch(error => {
                        if (error.response.status === 422) {
                            const errors = error.response.data.errors;

                            console.log(Object.keys(errors));

                            // errors.forEach((key, value) => console.log(value));
                            swal({
                                html: '<p v-for="item in Object.keys(errors)">{{ errors[item] }}</p>',
                                type: 'error',
                                timer: 3000,
                            });
                        }
                    });
            },

            getGalleries() {
                axios
                    .get('/api/admin/galleries')
                    .then(response => {
                        this.galleries = response.data.galleries;
                        this.pagination.total = this.galleries.length
                    })
                    .catch(error => console.log(error.response));
            },

            approve(gallery) {

                const index = this.galleries.findIndex(
                    item => item.id === gallery.id
                );

                axios.patch(`/api/admin/galleries/${gallery.id}/approve`)
                    .then(response => {
                        this.galleries[index].state = 'تایید شده';
                        swal({
                            text: response.data.message,
                            type: 'success',
                            timer: 2500,
                            showConfirmButton: false,
                        });
                    }).catch(error);
            },

            block(gallery) {

                const index = this.galleries.findIndex(
                    item => item.id === gallery.id
                );

                axios.patch(`/api/admin/galleries/${gallery.id}/block`)
                    .then(response => {
                        this.galleries[index].state = 'مسدود';
                        swal({
                            text: response.data.message,
                            type: 'success',
                            timer: 2500,
                            showConfirmButton: false,
                        });
                    })
                    .catch(error);
            },

            unblock(gallery) {

                const index = this.galleries.findIndex(
                    item => item.id === gallery.id
                );

                axios.patch(`/api/admin/galleries/${gallery.id}/unblock`)
                    .then(response => {
                        this.galleries[index].state = 'تایید شده';
                        swal({
                            text: response.data.message,
                            type: 'success',
                            timer: 2500,
                            showConfirmButton: false,
                        });
                    })
                    .catch(error);
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
        },

        computed: {
            filteredroles() {
                let galleries = this.galleries;

                if (this.search) {
                    galleries = galleries.filter(row => {
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
                    galleries = galleries.slice().sort((a, b) => {
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

                return galleries;
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