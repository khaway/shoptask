<template>
    <div>
        <app-header></app-header>
        <transition name="fade" mode="out-in">
            <router-view class="view p-8"></router-view>
        </transition>
        <app-footer></app-footer>
    </div>
</template>

<script>
    import AppHeader from './partials/Header.vue'
    import AppFooter from './partials/Footer.vue'

    export default {
        components: {
            AppHeader,
            AppFooter
        }
    }
</script>

