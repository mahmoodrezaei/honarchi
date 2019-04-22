<template>
  <div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
      <div class="m-portlet m-portlet--mobile">
        <div class="col col-lg">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">محصولات در یک نگاه</h3>
              </div>
            </div>

            <div class="m-portlet__head-tools">
              <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                  <router-link :to="`/admin/products/create`">
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

          <div class="m-portlet__body"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Products"
};
</script>

<style scoped>
</style>