import Vue from 'vue'
import App from './views/App.vue'
import { createStore } from './store'
import { createRouter } from './router'
import { createAxios } from './axios'
import { sync } from 'vuex-router-sync'

Vue.prototype.$http = createAxios();

const store = createStore()
const router = createRouter()

sync(store, router)

const app = new Vue({
    router,
    store,
    el: '#app',
    render: h => h(App)
});
