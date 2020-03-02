<template>
    <tr class="hover:bg-grey-lighter">
        <td class="py-4 px-6 border-b border-grey-light">{{ item.name }}</td>
        <td class="py-4 px-6 border-b border-grey-light">{{ item.price }}</td>
        <td class="py-4 px-6 border-b border-grey-light">{{ item.quantity }}</td>
    </tr>
</template>

<script>
    export default {
        props: {
            item: Object
        }
    }
</script>
