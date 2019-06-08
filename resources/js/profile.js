import './setup';
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import routes from './routes/profileRoutes';

let router = new VueRouter({
    mode: "history",
    routes: routes,
});

Vue.component('profile', require('./views/profile/ProfileOverview').default);
Vue.component('profile-sidebar', require('./components/layouts/profile/ProfileSidebar').default);
Vue.component('flash', require('./components/layouts/Flash').default);
// Vue.component('flash', require('./components/layouts/Flash').default);

new Vue({
    el: '#_profile',
    router: router,
});