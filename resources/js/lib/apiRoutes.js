export default {};
export { optionRoutes, attributesRoutes };

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
