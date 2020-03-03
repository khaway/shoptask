<template>
    <div>
        <div class="flex mb-4">
            <div class="w-1/4 h-12 p-4">
                <sidebar></sidebar>
            </div>
            <div class="w-3/4 h-12 p-4">
                <h1 class="text-5xl mb-6">Category Products</h1>
                <product-list :products="products"></product-list>
                <pagination :data="pagination" @pagination-change-page="loadCategoryProducts"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapState } from "vuex";
    import Sidebar from "../partials/Sidebar";
    import ProductList from "../components/ProductList";

    export default {
        components: { Sidebar, ProductList },
        computed: {
            ...mapState('catalog', ['pagination']),
            ...mapGetters('catalog', ['products'])
        },
        watch: {
            '$route.params.id': function () {
                this.loadCategoryProducts();
            }
        },
        mounted() {
            this.loadCategoryProducts();
        },
        methods: {
            loadCategoryProducts(page = 1) {
                this.$store.dispatch('catalog/loadCategoryProducts', {
                    app: this,
                    categoryId: this.$route.params.id,
                    page
                })
            }
        }
    }
</script>
