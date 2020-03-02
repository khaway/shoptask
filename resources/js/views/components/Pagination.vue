<template>
    <ul class="flex list-reset border border-grey-light rounded w-1/4 font-sans">
        <li><a class="block hover:text-white hover:bg-blue text-blue border-r border-grey-light px-3 py-2" v-bind:href="pagination.prev_page_url">Previous</a></li>
        <li><a class="block hover:text-white hover:bg-blue text-blue border-r border-grey-light px-3 py-2" href="#">{{ pagination.current_page }} / {{ pagination.total }}</a></li>
        <li><a class="block hover:text-white hover:bg-blue text-blue px-3 py-2" :href="pagination.next_page_url">Next</a></li>
    </ul>
</template>
<script>
    import { mapGetters } from 'vuex';

    export default {
        computed: {
            ...mapGetters('catalog', ['pagination'])
        }
    }
</script>
