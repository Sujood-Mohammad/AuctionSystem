// resources/js/router/index.js
import { createRouter, createWebHistory } from 'vue-router';
import ProductsPage from '../components/ProductsPage.vue';

const routes = [
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

export default router;
