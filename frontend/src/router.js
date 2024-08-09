import { createRouter, createWebHistory } from 'vue-router';
import Products from './components/Products.vue';
import ProductDetail from './components/ProductDetail.vue';
import Home from './components/Home.vue';
import Categories from "@/components/Categories.vue";
import ProductsCategory from "@/components/ProductsCategory.vue";

const routes = [
    { path: '/', component: Home },
    { path: '/products', component: Products },
    { path: '/products/:id', component: ProductDetail },
    { path: '/categories', component: Categories },
    { path: '/categories/:id', component: ProductsCategory },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
