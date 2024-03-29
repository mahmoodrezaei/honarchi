import VueRouter from "vue-router";
import Users from "../views/panel/users/Users";
import Permissions from "../views/panel/permissions/Permissions";
import Roles from "../views/panel/roles/Roles.vue";
import Galleries from "../views/panel/galleries/Galleries";

import Products from "../views/panel/products/Products";
import ProductsCreate from "../views/panel/products/Create";
import ProductsEdit from "../views/panel/products/Edit";

import Features from "../views/panel/attributes/Features";

import Options from "../views/panel/options/Options";
import OptionsCreate from "../views/panel/options/Create";
import OptionsEdit from "../views/panel/options/Edit";

import Attributes from "../views/panel/attributes/Attributes";
import AttributesCreate from "../views/panel/attributes/Create";
import AttributesEdit from "../views/panel/attributes/Edit";

import Categories from "../views/panel/categories/Categories";
import CategoriesCreate from "../views/panel/categories/Create";
import CategoriesEdit from "../views/panel/categories/Edit";

import FileManager from "../views/panel/file_manager/File_Manager";

import Articles from "../views/panel/blog/Articles";
import ArticlesCreate from "../views/panel/blog/Create";
import ArticlesEdit from "../views/panel/blog/Edit";

Vue.use(VueRouter);

let routes = [
    { path: "/admin/users", component: Users },

    { path: "/admin/permissions", component: Permissions },

    { path: "/admin/categories", component: Categories },

    { path: "/admin/features", component: Features },

    { path: "/admin/roles", component: Roles },

    { path: "/admin/galleries", component: Galleries },

    { path: "/admin/products", component: Products },
    { path: "/admin/products/create", component: ProductsCreate },
    { path: "/admin/products/:id/edit", component: ProductsEdit },

    { path: "/admin/options", component: Options },
    { path: "/admin/options/create", component: OptionsCreate },
    { path: "/admin/options/:id/edit", component: OptionsEdit },

    { path: "/admin/attributes", component: Attributes },
    { path: "/admin/attributes/create", component: AttributesCreate },
    { path: "/admin/attributes/:id/edit", component: AttributesEdit },

    { path: "/admin/categories", component: Categories },
    { path: "/admin/categories/create", component: CategoriesCreate },
    { path: "/admin/categories/:id/edit", component: CategoriesEdit },

    { path: "/admin/file_manager", component: FileManager },

    { path: "/admin/articles", component: Articles },
    { path: "/admin/articles/create", component: ArticlesCreate},
    { path: "/admin/articles/:id/edit", component: ArticlesEdit}
];

let router = new VueRouter({
    mode: "history",
    routes: routes
});

export default router;
