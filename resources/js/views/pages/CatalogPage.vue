<template>
    <div>
        <div class="flex mb-4">
            <div class="w-1/4 h-12 p-4">
                <sidebar></sidebar>
            </div>
            <div class="w-3/4 h-12 p-4">
                <h1 class="text-5xl mb-6">Last Products</h1>
                <product-list :products="products"></product-list>
                <pagination :data="pagination" @pagination-change-page="loadAllProducts"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapState } from 'vuex';
    import Sidebar from '../partials/Sidebar';
    import ProductList from "../components/ProductList";

    export default {
        components: { Sidebar, ProductList },
        computed: {
            ...mapState('catalog', ['pagination']),
            ...mapGetters('catalog', ['products'])
        },
        created() {
            this.loadAllProducts()
        },
        methods: {
            loadAllProducts(page = 1) {
                this.$store.dispatch('catalog/loadAllProducts', {
                    app: this,
                    page
                })
            }
        }
    }
</script>
