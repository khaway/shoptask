<template>
    <div>
        <div class="w-full max-w-lg m-auto" v-if="items.length">
            <h1 class="text-5xl mb-6">Cart</h1>
            <div class="bg-white shadow-md rounded my-6 mb-6">
                <table class="text-left w-full">
                    <thead>
                    <tr>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Name
                        </th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Price
                        </th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Quantity
                        </th>
                    </tr>
                    </thead>
                    <tbody v-if="items">
                        <cart-item-row v-for="item in items" :item="item" v-bind:key="item.id"></cart-item-row>
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light font-bold text-center">Total</td>
                            <td class="py-4 px-6 border-b border-grey-light font-bold text-center">{{ totalPrice }}$</td>
                            <td class="py-4 px-6 border-b border-grey-light font-bold text-center">{{ totalCount }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <router-link to="/checkout"
                         class="w-full shadow bg-green-900 hover:bg-green-100 focus:shadow-outline focus:outline-none text-white font-bold p-4 rounded">
                Proceed to checkout
            </router-link>
        </div>
        <div v-if="!items.length">Not items..</div>
    </div>
</template>

<script>
    import { mapGetters } from "vuex";
    import { mapMultiRowFields } from 'vuex-map-fields';
    import CartItemRow from "../components/CartItemRow";

    export default {
        components: {
            CartItemRow
        },
        computed: {
            ...mapGetters('cart', ['totalPrice', 'totalCount']),
            ...mapMultiRowFields('cart', ['items'])
        },
        methods: {

        }
    }
</script>
