export default {
    computed: {
        cartTotalCount() {
            return this.$store.state.cart.totalCount;
        }
    }
}
