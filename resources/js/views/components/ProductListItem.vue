<template>
    <div>
        <div class="w-full rounded overflow-hidden shadow-lg mb-6">
<!--            <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains">-->
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">
                    <router-link :to="{name: 'products.show', params: {id: item.id}}">{{ item.name }}</router-link>
                </div>
                <p class="text-gray-700 text-base">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                </p>
                <p><i class="fas fa-eye"></i> {{ item.visitsCount }}</p>
            </div>
            <div class="px-6 py-4">
                <span v-on:click="addToCart" class="inline-block bg-green-100 rounded-full px-3 py-1 text-sm font-semibold text-white cursor-pointer">Add to cart {{ item.price }}$</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            item: Object
        },
        methods: {
            addToCart() {
                this.$store.commit('cart/addItem', {
                    id: this.item.id,
                    quantity: 1,
                    price: this.item.price,
                    name: this.item.name
                })
            }
        }
    }
</script>
