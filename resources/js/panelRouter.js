import VueRouter from "vue-router";
import Users from "./components/panel/Users";
import Permissions from "./components/panel/Permissions";
import Categories from "./components/panel/Categories.vue";
import Roles from "./components/panel/Roles.vue";

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
        path: "/admin/roles",
        component: Roles
    }
];

let router = new VueRouter({
    mode: "history",
    routes: routes
});

export default router;
