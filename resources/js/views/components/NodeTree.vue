<template>
    <div>
        <span v-if="node.term">
            <router-link v-bind:class="[isActive(node), padding(node)]" :to="{ name: 'catalog.category', params: { id: node.term_taxonomy_id }}">
                {{ node.term.name}} ({{ node.products_count }})
            </router-link>
        </span>
        <span v-if="node.length">
            <router-link v-bind:class="[isActive(category), padding(category)]" :to="{ name: 'catalog.category', params: { id: category.term_taxonomy_id }}" v-for="category in node" :key="category.term_taxonomy_id">
                <span v-if="category.term" class="label">{{ category.term.name }} ({{ category.products_count }})</span>
                <ul v-if="category.children && category.children.length">
                    <node v-for="child in category.children" :key="child.term_taxonomy_id" :node="child"></node>
                </ul>
            </router-link>
        </span>
    </div>
</template>

<script>
    export default {
        name: "node",
        props: {
            node: Array|Object
        },
        methods: {
            isActive(node) {
                if (this.$route.params.id == node.term_taxonomy_id) {
                    return 'font-bold'
                }
            },
            padding(node) {
                return 'pl-' + node.depth;
            }
        }
    };
</script>
