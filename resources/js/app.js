require('./bootstrap');

window.Vue = require('vue');
import addContact from './components/addContact.vue';
import Contacts from './components/ContactList.vue';

import editContact from './components/editContact.vue';
import Register from './pages/Register.vue';
import Login from './pages/Login.vue';

//sweet alert 2
import VueSweetalert2 from 'vue-sweetalert2';
window.Swal = require('sweetalert2');
Vue.use(VueSweetalert2);

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import utils from './helpers/utilities';
Vue.prototype.$utils = utils

Vue.component('spinner', require('vue-simple-spinner'));

import VueAxios from 'vue-axios';
import axios from 'axios';
import App from './App.vue';

Vue.use(VueAxios, axios);

const routes = [

  {
    name: 'add_contacts',
    path: '/add_contacts',
    component: addContact
  },
  {
    name: 'contacts',
    path: '/contacts',
    component: Contacts
  },
  {
    name: 'get_contact',
    path: '/contact/edit/:id?',
    component: editContact
 },
 {
  name: 'register',
  path: '/register',
  component: Register
  },
  {
    name: 'login',
    path: '/login',
    component: Login
  }
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');



