<template>
    <div>
        <app-header></app-header>
        <transition name="fade" mode="out-in">
            <router-view class="view p-8"></router-view>
        </transition>
    </div>
</template>

<script>
    import AppHeader from './partials/Header.vue'

    export default {
        components: { AppHeader }
    }
</script>

