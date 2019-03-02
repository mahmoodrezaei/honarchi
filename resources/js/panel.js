import './bootstrap'
import router from './panelRouter'

import Panel from './components/Panel'

const panel = new Vue({
    el: '#panel',
    render: h => h(Panel),
    router
});