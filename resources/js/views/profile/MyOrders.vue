<template>
    <!-- Start Profile -->
        <div class="col-lg-9 col-md-8 pt-5 p-left">
                    <div class="alert alert-warning text-right">
                        سفارش شما در انتظار پرداخت است. برای جلوگیری از لغو سفارش ، لطفا پرداخت را انجام دهید.
                    </div>
                    <div class="profile-box">
                        <div class="title-products text-right">
                            <h3 class="pro-title fs-18 dastnevis header-gradient d-inline-block px-4 px-md-4 mb-0 mt-0 pb-2">همه خرید ها</h3>
                            <hr class="under-title">
                        </div>
                        <div class="pbox bg-ff bx-sh px-3 py-3">
                            <div class="op-order-list fs-14 clr-75 text-center">
                                <div class="op-content">
                                    <div class="op-title">
                                        <div class="opt-item opt-number">
                                            #
                                        </div>
                                        <div class="opt-item opt-code">
                                            شماره سفارش
                                        </div>
                                        <div class="opt-item opt-date">
                                            تاریخ ثبت سفارش
                                        </div>
                                        <div class="opt-item opt-deliver">
                                            وضعیت تحویل
                                        </div>
                                        <div class="opt-item opt-price">
                                            مبلغ  سفارش
                                        </div>
                                        <div class="opt-item opt-pay">
                                            عملیات پرداخت
                                        </div>
                                        <div class="opt-item opt-details">
                                            جزئیات
                                        </div>
                                    </div>
                                    <div class="op-details pt-2">
                                        <div class="opd-item">
                                            <div class="opt-item opt-number opd opdn">
                                                1
                                            </div>
                                            <div class="opt-item opt-code opd">
                                                HNC-57482
                                            </div>
                                            <div class="opt-item opt-date opd">
                                                20 فروردین 98
                                            </div>
                                            <div class="opt-item opt-deliver opd text-success">
                                                تحویل شده
                                            </div>
                                            <div class="opt-item opt-price opd text-danger">
                                                120000 تومان
                                            </div>
                                            <div class="opt-item opt-pay opd text-success">
                                                پرداخت موفق
                                            </div>
                                            <div class="opt-item opt-details">
                                                <router-link to="/profile/my-orders/edit" class="fs-20 clr-75 text-center">
                                                    <i class="fal fa-arrow-from-right"></i>
                                                </router-link>
                                            </div>
                                        </div>
                                        <div class="opd-item">
                                            <div class="opt-item opt-number opd opdn">
                                                2
                                            </div>
                                            <div class="opt-item opt-code opd">
                                                HNC-57482
                                            </div>
                                            <div class="opt-item opt-date opd">
                                                20 فروردین 98
                                            </div>
                                            <div class="opt-item opt-deliver opd text-success">
                                                تحویل شده
                                            </div>
                                            <div class="opt-item opt-price opd text-danger">
                                                120000 تومان
                                            </div>
                                            <div class="opt-item opt-pay opd text-success">
                                                پرداخت موفق
                                            </div>
                                            <div class="opt-item opt-details">
                                                <a href="" class="fs-20 clr-75 text-center">
                                                    <i class="fal fa-arrow-from-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="opd-item">
                                            <div class="opt-item opt-number opd opdn">
                                                3
                                            </div>
                                            <div class="opt-item opt-code opd">
                                                HNC-57482
                                            </div>
                                            <div class="opt-item opt-date opd">
                                                20 فروردین 98
                                            </div>
                                            <div class="opt-item opt-deliver opd text-success">
                                                تحویل شده
                                            </div>
                                            <div class="opt-item opt-price opd text-danger">
                                                120000 تومان
                                            </div>
                                            <div class="opt-item opt-pay opd text-success">
                                                پرداخت موفق
                                            </div>
                                            <div class="opt-item opt-details">
                                                <a href="" class="fs-20 clr-75 text-center">
                                                    <i class="fal fa-arrow-from-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="opd-item">
                                            <div class="opt-item opt-number opd opdn">
                                                4
                                            </div>
                                            <div class="opt-item opt-code opd">
                                                HNC-57482
                                            </div>
                                            <div class="opt-item opt-date opd">
                                                20 فروردین 98
                                            </div>
                                            <div class="opt-item opt-deliver opd text-success">
                                                -
                                            </div>
                                            <div class="opt-item opt-price opd text-danger">
                                                120000 تومان
                                            </div>
                                            <div class="opt-item opt-pay opd text-success">
                                                <a href="" class="btn opt-btn">
                                                    پرداخت
                                                </a>
                                            </div>
                                            <div class="opt-item opt-details">
                                                <a href="" class="fs-20 clr-75 text-center">
                                                    <i class="fal fa-arrow-from-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- End Profile -->
</template>

<script>
    export default {
        name: "MyOrders"
    }
</script>

<style scoped>

</style>