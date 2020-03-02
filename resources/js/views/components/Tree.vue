<template>
    <div class="tree">
        <ul class="tree-list">
            <node-tree :node="treeData"></node-tree>
        </ul>
    </div>
</template>

<script>
    import NodeTree from "./NodeTree";

    export default {
        props: {
            treeData: Array
        },
        components: {
            NodeTree
        }
    };
</script>
