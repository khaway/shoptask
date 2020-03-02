<template>
    <div>
        <div class="w-full max-w-lg m-auto" v-if="items.length">
            <h1 class="text-5xl mb-6">Checkout</h1>
            <form  @submit.prevent="checkout">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Initials
                        </label>
                        <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="initials" id="initials" v-model="fields.initials" />
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Phone
                        </label>
                        <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="phone" id="phone" v-model="fields.phone" />
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            Delivery Address
                        </label>
                        <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="delivery_address" id="delivery_address" v-model="fields.delivery_address" />
                    </div>
                </div>
                <div v-if="delivery_types" class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full px-3 mb-6 md:mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                            Delivery Type
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="delivery_type" id="delivery_type" v-model="fields.delivery_type">
                                <option v-for="delivery_type in delivery_types" :value="delivery_type.id">{{ delivery_type.name }}</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="w-full shadow bg-green-900 hover:bg-green-100 focus:shadow-outline focus:outline-none text-white font-bold py-4 px-4 rounded">
                    Checkout
                </button>
            </form>
        </div>
        <div v-else>Cart is empty...</div>
    </div>
</template>

<script>
    import { mapState } from "vuex";

    export default {
        data() {
            return {
                fields: {},
                delivery_types: null
            }
        },
        computed: {
            ...mapState('cart', ['items']),
            ...mapState(['apiUrls'])
        },
        mounted() {
            this.loadDeliveryTypes()
        },
        methods: {
            async loadDeliveryTypes() {
                this.$http.get(this.apiUrls.delivery_types.index)
                    .then(response => {
                        this.delivery_types = response.data
                    })
            },
            checkout() {
                this.$http.post(this.apiUrls.orders.store, {
                    items: this.items.map((item) => item['id']),
                    ...this.fields
                }).then(() => {
                    this.$alert.success('Checkout success')
                    this.$store.commit('cart/clear')
                });
            }
        }
    }
</script>
