import VueRouter from "vue-router";
import Users from "../views/panel/users/Users";
import Permissions from "../views/panel/permissions/Permissions";
import Categories from "../views/panel/categories/Categories.vue";
import Roles from "../views/panel/roles/Roles.vue";
import Galleries from "../views/panel/galleries/Galleries";
import Products from "../views/panel/products/Products";
import Features from "../views/panel/attributes/Features";

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
