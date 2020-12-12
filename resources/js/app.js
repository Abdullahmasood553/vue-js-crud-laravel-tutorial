require('./bootstrap');

window.Vue = require('vue');

import Contacts from './components/ContactList.vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

const routes = [
    {
      name: 'contacts',
      path: '/contacts',
      component: Contacts
    }
  ];

  Vue.component('spinner', require('vue-simple-spinner'));
  
    import VueAxios from 'vue-axios';
    import axios from 'axios';
    import App from './App.vue';

    Vue.use(VueAxios, axios);    

const router = new VueRouter({ mode: 'history', routes: routes});  
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');