<template>
    <div>
        <div v-if="products.length">
            <div v-for="product in products">
                <product-list-item :item="product"></product-list-item>
            </div>
            <pagination></pagination>
        </div>
        <div v-else>No products in category...</div>
    </div>
</template>

<script>
    import Pagination from "./Pagination";
    import ProductListItem from "./ProductListItem";

    export default {
        components: { ProductListItem, Pagination },
        props: { products: Array }
    }
</script>
