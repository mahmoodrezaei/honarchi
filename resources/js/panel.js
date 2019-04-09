import "./bootstrap";
import router from "./routes/panelRouter";

import Panel from "./components/layouts/Panel";

const panel = new Vue({
    el: "#panel",
    render: h => h(Panel),
    router
});
