require('./bootstrap');

import Vue from 'vue';
import VueCompositionApi from "@vue/composition-api";
import VueRouter from 'vue-router';
import Vuex from 'vuex';

import VueChatScroll from 'vue-chat-scroll'

import { routes } from './routes';
import StoreData from './store';
import BaseApp from './components/BaseApp';
import {initialize} from "./services/helpers/initialize";

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import 'element-ui/lib/theme-chalk/display.css';
import locale from 'element-ui/lib/locale/lang/fr'

Vue.use(VueCompositionApi);
Vue.use(ElementUI, { locale });

Vue.use(VueChatScroll);
Vue.use(VueRouter);
Vue.use(Vuex);

const store = new Vuex.Store(StoreData);

const router = new VueRouter({
    routes,
    mode: 'history'
});

initialize(store, router);

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        BaseApp
    }
});
