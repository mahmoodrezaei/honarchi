export default [
    {
        path: "/profile/",
        component: require('../views/profile/ProfileOverview').default,
    },
    {
        path: '/profile/address',
        component: require('../views/profile/Address').default,
    }
]