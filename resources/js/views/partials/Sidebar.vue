<template>
    <div>
        <div v-if="products_categories">
            <tree :tree-data="products_categories"></tree>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    import Tree from "../components/Tree";

    export default {
        components: { Tree },
        computed: {
            ...mapState('catalog', ['products_categories'])
        },
        created() {
            console.log(this.products_categories);
            this.$store.watch(
                (state) => state.catalog.products_categories,
                (newValue, oldValue) => {
                    // console.log(`Updating from ${oldValue} to ${newValue}`);
                },
            );
        },
        mounted() {
            this.$store.dispatch('catalog/loadProductsCategories', {app: this})
        }
    }
</script>
