import Vue from 'vue';
import Router from 'vue-router';
import IndexComponent from "../components/IndexComponent";
import CabinetPage from "../pages/CabinetPage";
import AdminCabinetPage from "../pages/AdminCabinetPage";
import ClientCabinetPage from "../pages/ClientCabinetPage";
import ClientCabinetSingleSupportPage from "../pages/ClientCabinetSingleSupportPage";

Vue.use(Router);

export default new Router({
    mode: 'history',
    base: '/',
    scrollBehavior: () => ({y: 0}),
    routes: [
        {
            path: '/',
            redirect: '/cabinet'
        },
         {
            path: '/cabinet',
            name: 'CabinetPage',
            component: CabinetPage
        },
        {
            path: '/cabinet/admin',
            name: 'AdminCabinetPage',
            component: AdminCabinetPage
        },
        {
            path: '/cabinet/admin/support/:userId/:supportId',
            name: 'AdminCabinetViewSingleSupportPage',
            component: ClientCabinetSingleSupportPage
        },
        {
            path: '/cabinet/client/:userId',
            name: 'ClientCabinetPage',
            component: ClientCabinetPage
        },
        {
            path: '/cabinet/client/:userId/:supportId',
            name: 'ClientCabinetSingleSupportPage',
            component: ClientCabinetSingleSupportPage
        },
    ]
});
