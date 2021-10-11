import { createRouter, createWebHistory } from 'vue-router'

import LinkIndex from '../components/link/LinkIndex.vue'
import LinkShow from '../components/link/LinkShow.vue'

const routes = [
    {
        path: '/',
        name: 'links.index',
        component: LinkIndex
    },
    {
        path: '/links/:slug?',
        name: 'links.show',
        component: LinkShow
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})