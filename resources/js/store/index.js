import Vue from 'vue'
import Vuex from 'vuex'
import cart from './cart'
import catalog from './catalog'
import createPersistedState from 'vuex-persistedstate';

Vue.use(Vuex);

export function createStore () {
    return new Vuex.Store({
        state: {
            ...window.laravel
        },
        modules: {
            cart,
            catalog
        },
        plugins: [createPersistedState({
            paths: [
                'cart.items',
                'cart.totalCount',
                'cart.totalPrice'
            ]
        })]
    })
}
