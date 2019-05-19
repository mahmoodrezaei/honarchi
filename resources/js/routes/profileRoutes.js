export default [
    {
        path: "/profile/",
        component: require('../views/profile/ProfileOverview').default,
    },
    {
        path: '/profile/my-orders',
        component: require('../views/profile/MyOrders').default,
    },
    {
        path: '/profile/my-orders/edit',
        component: require('../views/profile/MyOrdersDetail').default,
    },
    {
        path: '/profile/wishlist',
        component: require('../views/profile/Wishlist').default,
    },
    {
        path: '/profile/address',
        component: require('../views/profile/Address').default,
    },
    {
        path: '/profile/personal/info',
        component: require('../views/profile/PersonalInfo').default
    },
    {
        path: '/profile/personal/edit',
        component: require('../views/profile/PersonalInfoEdit').default
    },
    {
        path: '/profile/shop/info',
        component: require('../views/profile/ShopInfo').default
    },
    {
        path: '/profile/shop/edit',
        component: require('../views/profile/ShopInfoEdit').default
    }
]