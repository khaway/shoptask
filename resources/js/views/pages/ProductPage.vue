<template>
    <div>
        <div class="flex mb-4">
            <div class="w-1/4 h-12 p-4">
                <sidebar></sidebar>
            </div>
            <div class="w-3/4 h-12 p-4">
                <h1 class="text-5xl mb-6">{{ item.name }}</h1>
                <p>Price - {{ item.price }}$</p>
                <p>Quantity - {{ item.quantity }}</p>
                <div class="px-6 py-4" v-if="item.quantity">
                    <span v-on:click="addToCart" class="inline-block bg-green-100 rounded-full px-3 py-1 text-sm font-semibold text-white cursor-pointer">Add to cart {{ item.price }}$</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState } from "vuex";
    import Sidebar from "../partials/Sidebar";

    export default {
        components: { Sidebar },
        data() {
            return {
                item: {}
            }
        },
        computed: {
            ...mapState(['apiUrls']),
            productId() {
                return this.$route.params.id;
            }
        },
        mounted() {
            this.loadProduct();
        },
        methods: {
            async loadProduct() {
                return this.$http.get(this.apiUrls.products.show + `/${this.productId}`)
                    .then(response => {
                        this.item = response.data
                        this.incrementVisits(this.item.id)
                    })
            },
            incrementVisits(productId) {
                return this.$http.post(this.apiUrls.products_visits.increment, {
                    id: productId
                })
            },
            addToCart() {
                this.$store.commit('cart/addItem', {
                    id: this.item.id,
                    quantity: 1,
                    price: this.item.price,
                    name: this.item.name
                })

                this.$alert.success('Added to cart!')
            }
        }
    }
</script>
