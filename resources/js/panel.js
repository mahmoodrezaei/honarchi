import "./bootstrap";
import Vue from "vue";
import router from "./panelRouter";

import vSelect from "vue-select";
import Panel from "./components/Panel";

Vue.component("v-select", {
    props: {
        maxHeight: {
            type: String,
            default: "100px"
        }
    },
    extends: vSelect
});

const panel = new Vue({
    el: "#panel",
    render: h => h(Panel),
    router
});
