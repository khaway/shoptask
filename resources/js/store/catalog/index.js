import { getField, updateField } from 'vuex-map-fields';

export default {
    namespaced: true,
    state: {
        products: [],
        products_categories: [],
        pagination: {},
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
            }, state.products)
        },
        products_categories: state => state.products_categories,
        pagination: state => state.pagination,
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
        SET_PAGINATION(state, pagination) {
            state.pagination = pagination
        },
    },
    actions: {
        async loadProductsCategories({ commit, rootState }, { app }) {
            app.$http.get(rootState.apiUrls.products_categories.index)
                .then(response => {
                    commit('LOAD_PRODUCTS_CATEGORIES', response.data)
                })
        },

        async loadLastProducts({commit, rootState}, { app }) {
            app.$http.get(rootState.apiUrls.products.index).then(response => {
                console.log(response.data);
                commit('LOAD_PRODUCTS', response.data.data)
                commit('SET_PAGINATION', {
                    current_page: response.data.current_page,
                    first_page_url: response.data.first_page_url,
                    from: response.data.from,
                    last_page: response.data.last_page,
                    last_page_url: response.data.last_page_url,
                    next_page_url: response.data.next_page_url,
                    path: response.data.path,
                    per_page: response.data.per_page,
                    prev_page_url: response.data.prev_page_url,
                    to: response.data.to,
                    total: response.data.total
                })
            })
        },

        async loadCategoryProducts({commit, rootState}, { app, categoryId, page }) {
            app.$http.get(rootState.apiUrls.catalog.show +  `/${categoryId}`, {
                params: { page }
            }).then(response => {
                commit('LOAD_PRODUCTS', response.data.data)
                commit('SET_PAGINATION', {
                    current_page: response.data.current_page,
                    first_page_url: response.data.first_page_url,
                    from: response.data.from,
                    last_page: response.data.last_page,
                    last_page_url: response.data.last_page_url,
                    next_page_url: response.data.next_page_url,
                    path: response.data.path,
                    per_page: response.data.per_page,
                    prev_page_url: response.data.prev_page_url,
                    to: response.data.to,
                    total: response.data.total
                })
            })
        }
    }
};
