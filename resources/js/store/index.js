import Vue from 'vue';
import Vuex from 'vuex';
import support from './modules/support';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        support
    }
});

