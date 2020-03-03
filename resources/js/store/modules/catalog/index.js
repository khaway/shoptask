import { getField, updateField } from 'vuex-map-fields';

export default {
    namespaced: true,
    state: {
        products: {},
        products_categories: [],
        last_page: 1,
        filters: {
            chosen: [],
        }
    },
    getters: {
        getField,
        products: (state, getters) => {
            return state.filters.chosen.reduce((products, filter) => {
                if (filter.includes('filtred')) {
                    return getters[filter];
                }

                return products;
            }, state.products.data)
        },
        products_categories: state => state.products_categories,
        filtredByQuantity(state) {
            return state.products.filter(product => {
                return product.quantity
            })
        }
    },
    mutations: {
        updateField,
        LOAD_PRODUCTS_CATEGORIES(state, products_categories) {
            state.products_categories = products_categories
        },
        LOAD_PRODUCTS(state, products) {
            state.products = products
        },
        SET_LAST_PAGE(state, page) {
            state.last_page = page
        }
    },
    actions: {
        async loadProductsCategories({ commit, rootState }, { app }) {
            app.$http.get(rootState.apiUrls.products_categories.index)
                .then(response => {
                    commit('LOAD_PRODUCTS_CATEGORIES', response.data)
                })
        },

        async loadAllProducts({commit, rootState}, { app, page }) {
            app.$http.get(rootState.apiUrls.products.index, {
                params: { page }
            }).then(response => {
                commit('LOAD_PRODUCTS', response.data)
                commit('SET_LAST_PAGE', page);
            })
        },

        async loadCategoryProducts({commit, rootState}, { app, categoryId, page }) {
            app.$http.get(rootState.apiUrls.catalog.show +  `/${categoryId}`, {
                params: { page }
            }).then(response => {
                commit('LOAD_PRODUCTS', response.data)
                commit('SET_LAST_PAGE', page);
            })
        }
    }
};
