import Vue from 'vue'
import App from './views/App.vue'
import { createStore } from './store'
import { createRouter } from './router'
import { sync } from 'vuex-router-sync'
import { createAxios } from './axios/index'

// Create axios instance for application.
Vue.prototype.$http = createAxios()

// Bind alerts.
Vue.prototype.$alert = require('alertifyjs')

// Create vuex store and vue router.
const store = createStore()
const router = createRouter()

// Sync vue router vs store.
sync(store, router)

// Create application.
const app = new Vue({
    router,
    store,
    el: '#app',
    render: h => h(App),
    mounted() {
        // Configure alerts.
        this.$alert.set('notifier', 'position', 'top-center');
    }
})
