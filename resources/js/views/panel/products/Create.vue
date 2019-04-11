<template>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="col col-lg">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">ایجاد مخصول جدید</h3>
                            </div>
                        </div>

                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <router-link :to="`/admin/products`">
                                        <button class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--air m-btn--pill">
                                            <i class="fa fa-arrow-left"></i>
                                        </button>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="m-portlet__body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" href="#product_detail">
                                    <i class="fa fa-cube m--font-success"></i> جزییات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#product_attributes">
                                    <i class="fa fa-cubes m--font-warning"></i> ویژگی‌ها
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#product_options">
                                    <i class="flaticon-interface-7 m--font-danger"></i>گزینه‌ها
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#product_recommendation">
                                    <i class="fa fa-puzzle-piece m--font-info"></i>محصولات پیشنهادی
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#product_variants">
                                    <i class="fa fa-code-branch m--font-primary" style="transform: rotate(180deg)"></i>مدیریت متغیرها
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#product_gallery">
                                    <i class="fab fa-goodreads-g m--font-accent"></i>گالری
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="product_detail" role="tabpanel">
                                <product-details></product-details>
                            </div>
                            <div class="tab-pane" id="product_attributes" role="tabpanel">
                                <product-attributes></product-attributes>
                            </div>
                            <div class="tab-pane" id="product_options" role="tabpanel">
                                <product-options></product-options>
                            </div>
                            <div class="tab-pane" id="product_recommendation" role="tabpanel">
                                <product-recommendation></product-recommendation>
                            </div>
                            <div class="tab-pane" id="product_variants" role="tabpanel">
                                <product-variants></product-variants>
                            </div>
                            <div class="tab-pane" id="product_gallery" role="tabpanel">
                                <product-gallery></product-gallery>
                            </div>
                        </div>


                        <div class="m-separator m-separator--dashed"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ProductDetails from './components/ProductDetails'
    import ProductAttributes from './components/ProductAttributes'
    import ProductOptions from './components/ProductOptions'
    import ProductRecommendation from './components/ProductRecommendation'
    import ProductVariants from './components/ProductVariants'
    import ProductGallery from './components/ProductGallery'

    export default {
        name: "Create.vue",

        components: {ProductDetails, ProductAttributes, ProductOptions, ProductRecommendation, ProductVariants, ProductGallery}
    }
</script>

<style scoped>

</style>