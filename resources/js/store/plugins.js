import createPersistedState from "vuex-persistedstate";

export default [
    createPersistedState({
        paths: [
            'cart.items',
            'catalog.filters.chosen'
        ]
    })
]
