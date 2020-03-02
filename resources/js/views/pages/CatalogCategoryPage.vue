<template>
    <div>
        <div class="flex mb-4">
            <div class="w-1/4 h-12 p-4">
                <sidebar></sidebar>
            </div>
            <div class="w-3/4 h-12 p-4">
                <h1 class="text-5xl mb-6">Category Products</h1>
                <product-list :products="products"></product-list>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState } from "vuex";
    import Sidebar from "../partials/Sidebar";
    import ProductList from "../components/ProductList";

    export default {
        components: { Sidebar, ProductList },
        computed: {
            ...mapState('catalog', ['products'])
        },
        watch: {
            '$route.params.id': function (id) {
                this.loadCategoryProducts(this.routeId());
            }
        },
        mounted() {
            this.loadCategoryProducts(this.routeId());
        },
        methods: {
            routeId() {
                return this.$route.params.id;
            },
            loadCategoryProducts(categoryId) {
                this.$store.dispatch('catalog/loadCategoryProducts', {
                    app: this,
                    categoryId
                })
            }
        }
    }
</script>
