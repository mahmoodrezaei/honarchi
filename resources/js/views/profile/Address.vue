<template>
    <!-- Start Profile -->
    <div class="col-lg-9 col-md-8 mt-2 p-left">
        <div class="profile-box">
            <div class="title-products text-right">
                <h3 class="pro-title fs-18 dastnevis header-gradient d-inline-block px-4 px-md-4 mb-0 mt-0 pb-2">آدرس‌ها</h3>
                <hr class="under-title">
            </div>

            <div v-for="(address, index) in addresses" :key="index" class="pbox bg-ff bx-sh px-3 py-3">
                <div class="row text-right">
                    <div class="col-lg-12 col-md-12 col-sm-12 my-1">
                        <p class="fs-16 m-0">{{ address.full_name}}</p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 my-1">
                        <p class="fs-16 m-0">{{ address.postal_address }}</p>
                    </div>
                </div>
                <div class="ab-hr d-none d-lg-block"></div>
                <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                    <i class="fal fa-barcode-read fs-20 d-inline-block"></i>
                    <p class="fs-14 m-0 mr-2 d-inline-block">کد پستی :</p>
                    <p class="fs-14 m-0 mr-2 d-inline-block">{{ address.postal_code }}</p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                    <i class="fal fa-mobile-alt fs-25 mr-1 d-inline-block"></i>
                    <p class="fs-14 m-0 mr-2 d-inline-block">تلفن همراه :</p>
                    <p class="fs-14 m-0 mr-2 d-inline-block">{{ address.phone }}</p>
                </div>
                <div class="text-left">
                    <button class="btn pro-frm-btn" @click="showEditAddressModal(address, index)" data-toggle="modal" data-target="#edit-address">ویرایش</button>
                    <button class="btn pro-frm-btn" @click="remove(address, index)">حذف</button>
                </div>
            </div>

        </div>

        <button class="btn btn-round add-address-btn p-4 my-4 clr-75 fs-18" data-toggle="modal" data-target="#add-address">
            <i class="fal fa-map-marker-plus d-block my-1"></i>
            افزودن آدرس جدید
        </button>

        <!-- Add new Address -->
        <div class="modal fade" id="add-address" tabindex="-1" role="">
            <div class="modal-dialog modal-login modal-lg" role="document">
                <div class="modal-content">
                    <div class="card card-signup card-plain">
                        <div class="modal-header">
                            <button type="button" id="close-new-address-modal" class="close mt-0" data-dismiss="modal" aria-label="Close">
                                <i class="fal fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form" method="" action="">
                                <p class="text-center">
                                    <img src="/assets/images/front/logo.svg" alt="هنرچی" style="width: 250px;">
                                </p>
                                <div class="card-body text-right">
                                    <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                                        <i class="fal fa-map-marked-alt fs-20 d-inline-block"></i>
                                        <p class="fs-14 m-0 mr-2 d-inline-block">افزودن آدرس جدید</p>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fal fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" v-model="newAddress.full_name" placeholder="نام و نام خانوادگی تحویل گیرنده">
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fal fa-mobile-alt"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" v-model="newAddress.phone" placeholder="شماره همراه ">
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fal fa-map-marker-alt"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" v-model="newAddress.province" placeholder="استان">
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fal fa-map-marked"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" v-model="newAddress.city" placeholder="شهر">
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fal fa-street-view"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" v-model="newAddress.postal_address" placeholder="آدرس پستی">
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fal fa-barcode-read"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" v-model="newAddress.postal_code" placeholder="کد پستی">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" @click="createNewAddress" class="btn pro-frm-btn px-4">ثبت آدرس</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Address -->
        <div class="modal fade" id="edit-address" tabindex="-1" role="">
            <div class="modal-dialog modal-login modal-lg" role="document">
                <div class="modal-content">
                    <div class="card card-signup card-plain">
                        <div class="modal-header">
                            <button type="button" id="close-edit-address-modal" class="close mt-0" data-dismiss="modal" aria-label="Close">
                                <i class="fal fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form" method="" action="">
                                <p class="text-center">
                                    <img src="/assets/images/front/logo.svg" alt="هنرچی" style="width: 250px;">
                                </p>
                                <div class="card-body text-right">
                                    <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                                        <i class="fal fa-map-marked-alt fs-20 d-inline-block"></i>
                                        <p class="fs-14 m-0 mr-2 d-inline-block">ویرایش آدرس</p>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fal fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" v-model="editAddress.full_name" placeholder="نام و نام خانوادگی تحویل گیرنده">
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fal fa-mobile-alt"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" v-model="editAddress.phone" placeholder="شماره همراه ">
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fal fa-map-marker-alt"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" v-model="editAddress.province" placeholder="استان">
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fal fa-map-marked"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" v-model="editAddress.city" placeholder="شهر">
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fal fa-street-view"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" v-model="editAddress.postal_address" placeholder="آدرس پستی">
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fal fa-barcode-read"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" v-model="editAddress.postal_code" placeholder="کد پستی">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" @click="updateAddress" class="btn pro-frm-btn px-4">ثبت آدرس</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Profile -->
</template>

<script>
    import Swal from 'sweetalert2';

    export default {
        name: "Address.vue",

        data() {
            return {
                addresses: '',

                newAddress: {},

                editAddress: {},
                editAddressIndex: '',
            }
        },

        mounted() {
            this.getAllAddresses();
        },

        methods: {
            getAllAddresses() {
                axios.get('/api/user/profile/address')
                    .then(response => {
                        this.addresses = response.data.addresses;
                    })
                    .catch(error => console.log(error.response));
            },

            createNewAddress() {
                axios.post('/api/user/profile/address', this.newAddress)
                    .then(response => {
                        flash(response.data.message);
                        this.addresses.push(response.data.address);
                        $('#close-new-address-modal').trigger('click');
                        this.newAddress = {};
                    })
                    .catch(error => console.log(error.response));
            },

            remove(address, index) {
                Swal.fire({
                    text: "آیا اطمینان دارید که میخواهید این مورد را حذف کنید؟",
                    type: "warning",
                    confirmButtonText: "<span><i class='la'></i><span>بله</span></span>",
                    confirmButtonClass:
                        "btn btn-danger m-btn m-btn--pill m-btn--air m-btn--icon",
                    showCancelButton: !0,
                    cancelButtonText: "<span><i class='la'></i><span>خیر</span></span>",
                    cancelButtonClass: "btn btn-secondary m-btn m-btn--pill m-btn--icon"
                }).then(answer => {
                    if (answer.value === true) {
                        axios.delete(`/api/user/profile/address/${address.id}`)
                            .then(response => {
                                flash(response.data.message);
                                this.addresses.splice(index, 1);
                            })
                            .catch(error => console.log(error.response));
                    }
                });
            },

            showEditAddressModal(address, index) {
                this.editAddress = address;
                this.editAddressIndex = index;
            },

            updateAddress() {
                axios.patch(`/api/user/profile/address/${this.editAddress.id}`, this.editAddress)
                    .then(response => {
                        flash(response.data.message);
                        this.addresses[this.editAddressIndex] = this.editAddress;
                        $('#close-edit-address-modal').trigger('click');
                        this.editAddress = {};
                    })
                    .catch(error => console.log(error.response));
            }
        }
    }
</script>