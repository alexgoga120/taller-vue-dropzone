require('../bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import vuetify from './vuetify/vuetify';
import store from "./vuex/vuex";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import HomeIndex from "./pages/HomeIndex";

Vue.use(VueSweetalert2);

const example = new Vue({
    el: '#example-div',
    vuetify,
    store,
    render: h => h(HomeIndex)
});
