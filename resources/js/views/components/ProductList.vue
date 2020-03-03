<template>
    <div>
        <div v-if="products.length">
            <div v-for="product in products">
                <product-list-item :item="product"></product-list-item>
            </div>
        </div>
        <div v-else>No products in category...</div>
    </div>
</template>

<script>
    import ProductListItem from "./ProductListItem";

    export default {
        components: { ProductListItem },
        props: { products: Array }
    }
</script>
