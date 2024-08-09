import { createRouter, createWebHistory } from 'vue-router';
import Products from './components/Products.vue';
import Home from './components/Home.vue';

const routes = [
    { path: '/', component: Home },
    { path: '/products', component: Products },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
