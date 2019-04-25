export default {};
export { optionRoutes, attributesRoutes, categoriesRoutes, productRoutes };

let optionRoutes = {
    index: { url: "/api/admin/options" },
    store: { url: "/api/admin/options" }
};

let attributesRoutes = {
    index: { url: "/api/admin/attributes" },
    store: { url: "/api/admin/attributes" },
    show: { url: "/api/admin/attributes/" },
    update: { url: "/api/admin/attributes/" },
    destroy: { url: "/api/admin/attributes/" }
};

let categoriesRoutes = {
    index: { url: "/api/admin/categories" },
    store: { url: "/api/admin/categories" },
    show: { url: "/api/admin/categories/" },
    update: { url: "/api/admin/categories/" },
    destroy: { url: "/api/admin/categories/" }
};

let productRoutes = {
    attributeStore(product) {
        return { url: "/api/admin/products/" + product + "/attributes" };
    },
    attributeRetrieve(product) {
        return { url: "/api/admin/products/" + product + "/attributes" };
    }
};
