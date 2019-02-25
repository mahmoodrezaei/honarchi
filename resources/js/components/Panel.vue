<template>
    <div style="min-width: 100%;">
        <!--@include('panel.layouts.sidebar')-->

        <custom-sidebar></custom-sidebar>

        <!-- Content section -->
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <!--<div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">Content</h3>
                    </div>
                </div>
            </div>-->
            <!-- END: Subheader -->

            <!-- Begin:: ContentSection -->
            <!--<div class="m-content">

            </div>-->
            <!-- END:: ContentSection -->
            <router-view></router-view>
        </div>
    </div>
</template>

<script>

    import CustomSidebar from './layouts/CustomSidebar'

    export default {
        components: { CustomSidebar }
    }
</script>