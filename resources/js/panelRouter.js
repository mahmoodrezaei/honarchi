import Vue from "vue";
import VueRouter from "vue-router";

import Users from "./components/panel/Users";
import Permissions from "./components/panel/Permissions";
import Categories from "./components/panel/Categories.vue";

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
    }
];

let router = new VueRouter({
    mode: "history",
    routes: routes
});

export default router;
