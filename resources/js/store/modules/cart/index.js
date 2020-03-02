import { getField, updateField } from 'vuex-map-fields';

export default {
    namespaced: true,
    state: {
        items: [],
        totalCount: 0,
        totalPrice: 0
    },
    getters: {
        getField,
        items: state => state.items,
        totalPrice: (state) => {
            var price = 0;

            state.items.forEach((item) => {
                price += (item.quantity * item.price)
            })

            return price;
        },
        totalCount: (state) => {
            var count = 0;

            state.items.forEach((item) => {
                count += Number.parseInt(item.quantity)
            })

            return count;
        },
    },
    mutations: {
        updateField,
        clear(state) {
            state.items = [];
            state.totalPrice = 0;
            state.totalCount = 0;
        },
        addItem(state, item) {
            let product = state.items.find(product => product.id === item.id);

            if (product) {
                product.quantity += 1;
            } else {
                state.items.push(item);
            }

            // state.totalPrice += item.quantity * item.price;
            // state.totalCount += item.quantity;
        }
    }
};
