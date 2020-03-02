const CartPage = () => import('../views/pages/CartPage.vue')
const ProductPage = () => import('../views/pages/ProductPage.vue')
const CatalogPage = () => import('../views/pages/CatalogPage.vue')
const CheckoutPage = () => import('../views/pages/CheckoutPage.vue')
const CatalogCategoryPage = () => import('../views/pages/CatalogCategoryPage.vue')

export default [
    {
        path: '/',
        name: 'catalog',
        component: CatalogPage
    },
    {
        path: '/cart',
        name: 'cart',
        component: CartPage
    },
    {
        path: '/catalog/:id',
        name: 'catalog.category',
        component: CatalogCategoryPage
    },
    {
        path: '/checkout',
        name: 'checkout',
        component: CheckoutPage
    },
    {
        path: '/products/:id',
        name: 'products.show',
        component: ProductPage
    }
]
