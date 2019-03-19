<template>
  <table class="m-datatable__table" style="display: block; min-height: 300px; overflow-x: auto;">
    <thead class="m-datatable__head">
      <tr class="m-datatable__row">
        <th
          v-for="column in columns"
          :key="column.name"
          class="m-datatable__cell m-datatable__cell--sort"
          @click="$emit('sort', column.name)"
        >
          <span style="width: 150px; cursor: pointer">
            {{ column.label }}
            <span>
              <i
                :class="sortKey === column.name ? (sortOrders[column.name] > 0 ? 'fa fa-sort-up' : 'fa fa-sort-down') : 'fa fa-sort'"
              ></i>
            </span>
          </span>
        </th>
        <th class="m-datatable__cell m-datatable__cell--sort">
          <span style="width: 150px;">
            عملیات
            <span>
              <i class="fa fa-toolbox"></i>
            </span>
          </span>
        </th>
      </tr>
    </thead>

    <slot></slot>
  </table>
</template>

<script>
export default {
  props: ["columns", "sortKey", "sortOrders"]
};
</script>