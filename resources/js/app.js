import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import ProductsPage from './components/ProductsPage.vue';
import axios from 'axios';
axios.defaults.withCredentials = true;

const routes = [
  {
    path: '/',
    name: 'Home',
    redirect: '/products',
  },
  {
    path: '/products',
    name: 'ProductsPage',
    component: ProductsPage
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

const app = createApp({
});

app.use(router);

app.mount('#app');

console.log('Vue app mounted');
