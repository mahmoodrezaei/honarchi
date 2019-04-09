import VueRouter from "vue-router";
import Users from "../views/panel/users/Users";
import Permissions from "../views/panel/permissions/Permissions";
import Categories from "../views/panel/categories/Categories.vue";
import Roles from "../views/panel/roles/Roles.vue";
import Galleries from "../views/panel/galleries/Galleries";
import Products from "../views/panel/products/Products";
import Features from "../views/panel/attributes/Features";

import Options from '../views/panel/options/Options';
import OptionsCreate from '../views/panel/options/Create';
import OptionsEdit from '../views/panel/options/Edit';

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
    },

    { path: "/admin/options", component: Options },
    { path: "/admin/options/create", component: OptionsCreate },
    { path: "/admin/options/:id/edit", component: OptionsEdit }
];

let router = new VueRouter({
    mode: "history",
    routes: routes
});

export default router;
