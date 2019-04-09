<template>
    <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
        <ul class="m-datatable__pager-nav">

            <li v-if="pagination.nextPage">
                <a @click="$emit('next')" title="Next" class="m-datatable__pager-link m-datatable__pager-link--next">
                    <i class="la la-angle-right"></i>
                </a>
            </li>
            <li v-else>
                <a title="Next" class="m-datatable__pager-link m-datatable__pager-link--next m-datatable__pager-link--disabled" disabled="disabled">
                    <i class="la la-angle-right"></i>
                </a>
            </li>
            <!--<li>
                <a title="Last" class="m-datatable__pager-link m-datatable__pager-link&#45;&#45;last" data-page="10">
                    <i class="la la-angle-double-right"></i>
                </a>
            </li>

            <li>
                <a title="First" class="m-datatable__pager-link m-datatable__pager-link&#45;&#45;first m-datatable__pager-link&#45;&#45;disabled" data-page="1" disabled="disabled">
                    <i class="la la-angle-double-left"></i>
                </a>
            </li>-->
            <li v-if="pagination.prevPage">
                <a @click="$emit('prev')" title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev" disabled="disabled">
                    <i class="la la-angle-left"></i>
                </a>
            </li>
            <li v-else>
                <a title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev m-datatable__pager-link--disabled" disabled="disabled">
                    <i class="la la-angle-left"></i>
                </a>
            </li>

        </ul>


        <div class="m-datatable__pager-info">
            <span class="m-datatable__pager-detail">نمایش {{ pagination.from }} - {{ pagination.to }} از {{ filtered.length }} رکورد</span>
            <span v-if="filtered.length < pagination.total"> (جستجو از بین {{ pagination.total }} رکورد)</span>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['pagination', 'filtered']
    }
</script>