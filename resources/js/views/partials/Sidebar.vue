<template>
    <div>
        <div v-if="products_categories">
            <tree :tree-data="products_categories"></tree>
        </div>
        <div class="mt-6">
            <label for="filtredByQuantity"><input type="checkbox" id="filtredByQuantity" value="filtredByQuantity" v-model="chosen"> Only in stock</label>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import Tree from "../components/Tree";
    import { mapFields } from 'vuex-map-fields';

    export default {
        components: { Tree },
        computed: {
            ...mapGetters('catalog', ['products_categories']),
            ...mapFields('catalog', ['filters.chosen'])
        },
        mounted() {
            this.$store.dispatch('catalog/loadProductsCategories', {app: this})
        }
    }
</script>
