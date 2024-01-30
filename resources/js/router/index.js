import { createRouter, createWebHistory } from "vue-router";

import IndexView from '../components/IndexView.vue';

import notFound from '../components/NotFound.vue';

const router = createRouter({history: createWebHistory(import.meta.env.BASE_URL),
    routes:[
        {
            path:'/',
            name: 'IndexView',
            component: IndexView
        },
        {
            path:'/:pathMatch(.*)*',
            name: 'NotFound',
            component: notFound
        },

    ]
})
    

export default router