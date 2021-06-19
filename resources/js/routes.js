import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from "./pages/Home";
import page404 from "./pages/404";


Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {path: "/", component: Home, meta: {name: 'Home'}, name: 'home'},
        {path: "*", component: page404, meta: {name: 'You Are Lost'}},
    ]
});

export default router;
