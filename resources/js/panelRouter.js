import VueRouter from "vue-router";
import Users from "./components/panel/Users";
import Permissions from "./components/panel/Permissions";
import Categories from "./components/panel/Categories.vue";
import Roles from "./components/panel/Roles.vue";
import Galleries from "./components/panel/Galleries";
import Products from "./components/panel/Products";
import Features from "./components/panel/Features";

Vue.use(VueRouter);

let routes = [
    {
        path: "/admin/users",
        component: Users
    },

    {
        path: "/admin/permissions",
        component: Permissions
    },

    {
        path: "/admin/categories",
        component: Categories
    },

    {
        path: "/admin/features",
        component: Features
    },

    {
        path: "/admin/roles",
        component: Roles
    },

    {
        path: "/admin/galleries",
        component: Galleries
    },

    {
        path: "/admin/products",
        component: Products
    }
];

let router = new VueRouter({
    mode: "history",
    routes: routes
});

export default router;
