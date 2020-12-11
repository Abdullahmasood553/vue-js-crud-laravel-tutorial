require('./bootstrap');

window.Vue = require('vue');

import Contacts from './../views/components/ContactList.vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

//  Vue.component('Home', require('./../views/components/Home.vue').default)


// const app = new Vue({
//     el:'#app'
// });

const routes = [
    {
      name: 'contacts',
      path: '/contacts',
      component: Contacts
    }
  ];

    import VueAxios from 'vue-axios';
    import axios from 'axios';
    import App from './App.vue';

    Vue.use(VueAxios, axios);    

const router = new VueRouter({ mode: 'history', routes: routes});  
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');