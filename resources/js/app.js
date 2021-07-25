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
import { setHeaderToken } from './utils/auth'

Vue.use(Toasted);
Vue.use(VueRouter);

const token = localStorage.getItem('token');

if (token) { 
  setHeaderToken(token) 
} 

const router = new VueRouter(routes)
router.beforeEach((to, from, next) => { 
  if (to.matched.some(record => record.meta.auth)) {
    if (store.getters.isLoggedIn && store.getters.user) {
      next()
      return
    }
    next('/login')
  }

  if (to.matched.some(record => record.meta.guest)) {
    if (!store.getters.isLoggedIn) {
      next()
      return
    }
    next('/profile')
  }

  next()
})

Vue.component('navigation', require('./components/Navigation.vue').default);

store.dispatch('get_user', token)
	.then(() => {
		new Vue({
			el: '#app',
			router,
			store
		});
	}).catch((error) => {
		console.log(error)
	}) 
