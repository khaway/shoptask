<template>
    <tr class="hover:bg-grey-lighter">
        <td class="py-4 px-6 border-b border-grey-light text-center">{{ item.name }}</td>
        <td class="py-4 px-6 border-b border-grey-light text-center">{{ item.price }}</td>
        <td class="py-4 px-6 border-b border-grey-light text-center">
            <input type="number" id="quantity" name="quantity" min="1" v-model="item.quantity">
        </td>
    </tr>
</template>

<script>
    export default {
        props: {
            item: Object
        }
    }
</script>
