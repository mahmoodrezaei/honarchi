<template>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="col col-lg">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">ایجاد گزینه جدید</h3>
                            </div>
                        </div>

                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <button @click="$router.push('/admin/options')"
                                            class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--air m-btn--pill">
                                        <i class="fa fa-arrow-left"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="m-portlet__body">
                            <!--begin::Form-->
                            <form class="m-form">
                                <div class="m-portlet__body">
                                    <div class="m-form__section m-form__section--first">
                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">Minimum Setup</label>
                                            <div class="col-lg-4">
                                                <div class="dropdown bootstrap-select form-control m-bootstrap-select m_">
                                                    <select class="form-control m-bootstrap-select m_selectpicker" tabindex="-98">
                                                        <option>Mustard</option>
                                                        <option>Ketchup</option>
                                                        <option>Relish</option>
                                                    </select>
                                                    <button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Mustard" aria-expanded="false"><div class="filter-option"><div class="filter-option-inner">Mustard</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu" role="combobox" style="max-height: 367.75px; overflow: hidden; min-height: 0px; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);" x-placement="bottom-start"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1" style="max-height: 355.75px; overflow-y: auto; min-height: 0px;"><ul class="dropdown-menu inner show"><li class="selected active"><a role="option" class="dropdown-item selected active" aria-disabled="false" tabindex="0" aria-selected="true"><span class=" bs-ok-default check-mark"></span><span class="text">Mustard</span></a></li><li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span class=" bs-ok-default check-mark"></span><span class="text">Ketchup</span></a></li><li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span class=" bs-ok-default check-mark"></span><span class="text">Relish</span></a></li></ul></div></div></div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">Full Name:</label>
                                            <div class="col-lg-4">
                                                <input type="email" class="form-control m-input" placeholder="Enter full name">
                                                <span class="m-form__help">Please enter your full name</span>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">Email address:</label>
                                            <div class="col-lg-4">
                                                <input type="email" class="form-control m-input" placeholder="Enter email">
                                                <span class="m-form__help">We'll never share your email with anyone else</span>
                                            </div>
                                        </div>
<!--                                        <div class="m-form__seperator m-form__seperator&#45;&#45;dashed  m-form__seperator&#45;&#45;space m&#45;&#45;margin-bottom-40"></div>-->
                                    </div>
                                </div>

                                <div class="m-form__actions m-form__actions">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <button type="reset" class="btn btn-success">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                        <div class="col-lg-2">
                                        </div>
                                    </div>
                                </div>

                            </form>

                            <!--end::Form-->
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import $ from "jquery";

    export default {
        name: "OptionsCreate",

        created() {
            this.bootStrapSelect();
        },

        methods: {
            bootStrapSelect() {
                var BootstrapSelect = {
                    init: function () {
                        $(".m_selectpicker").selectpicker()
                    }
                };
                jQuery(document).ready(function () {
                    BootstrapSelect.init()
                });
            }
        }
    }
</script>

<style scoped>

</style>