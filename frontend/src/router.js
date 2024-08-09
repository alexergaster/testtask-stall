import { createRouter, createWebHistory } from 'vue-router';
import Posts from './components/Posts.vue';
// import PostDetail from './components/PostDetail.vue';

const routes = [
    { path: '/posts', component: Posts },
    // { path: '/posts/:id', component: PostDetail, props: true }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
