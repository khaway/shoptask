<template>
    <div>
        <div v-if="products.length">
            <div v-for="product in products">
                <product-list-item :item="product"></product-list-item>
            </div>
            <pagination :pagination="pagination"></pagination>
        </div>
        <div v-if="!products.length">No products in category...</div>
    </div>
</template>

<script>
    import { mapState } from "vuex";
    import Pagination from "./Pagination";
    import ProductListItem from "./ProductListItem";

    export default {
        components: {
            ProductListItem, Pagination
        },
        computed: {
            ...mapState('catalog', ['pagination'])
        },
        props: {
            products: Array
        }
    }
</script>
