<template>
    <nav class="flex items-center justify-between flex-wrap bg-green-100 p-6">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <router-link :to="{ name: 'catalog' }">
                <span class="font-semibold text-xl tracking-tight">ShopApp</span>
            </router-link>
        </div>
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div>
                <router-link to="/cart" class="text-white">
                    <i class="fas fa-shopping-cart text-white"></i> / {{ totalCount }} / {{ totalPrice }}$
                </router-link>
            </div>
        </div>
    </nav>
</template>

<script>
    import {mapGetters} from "vuex";

    export default {
        computed: {
            ...mapGetters('cart', ['totalPrice', 'totalCount'])
        },
    }
</script>
