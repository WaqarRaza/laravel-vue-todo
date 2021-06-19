require('./bootstrap');

import Vue from 'vue';
import Route from '@/routes';
import App from '@/layout/App';

Vue.mixin({
    data() {
        return {
            basepath: BASEPATH,
        }
    },
    methods: {
        redirectTo(path) {
            this.$router.push({name: '', query: {redirect: path}});
            this.$router.push(this.$route.query.redirect)
        }
    },
})
const app = new Vue({
    el: '#app',
    data: {},
    router: Route,
    render: h => h(App),
});
