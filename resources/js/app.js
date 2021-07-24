import axios from 'axios';
window.axios = axios

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window._ = require('lodash');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}


import Vue from 'vue';
import VueRouter from 'vue-router';
import Toasted from 'vue-toasted';
import routes from './router';
import store from './vuex';

Vue.use(Toasted);
Vue.use(VueRouter);

Vue.component('navigation', require('./components/Navigation.vue').default);
const app = new Vue({
    el: '#app',
	router: new VueRouter(routes),
	store
});
