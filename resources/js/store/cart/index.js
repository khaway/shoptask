export default {
    namespaced: true,
    state: {
        items: [],
        totalCount: 0,
        totalPrice: 0
    },
    getters: {
        items: state => state.items,
        totalPrice: state => state.totalPrice,
        totalCount: state => state.totalCount,
    },
    mutations: {
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

            state.totalPrice += item.quantity * item.price;
            state.totalCount += item.quantity;
        }
    }
};
