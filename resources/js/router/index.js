import Vue from 'vue';
import Router from 'vue-router';
import IndexComponent from "../components/IndexComponent";

Vue.use(Router);

export default new Router({
    mode: 'history',
    base: '/',
    scrollBehavior: () => ({y: 0}),
    routes: [
        {
            path: '/cabinet/',
            // name: 'index',
            components: {
                indexComponent: IndexComponent
            }
        },
    ]
});
