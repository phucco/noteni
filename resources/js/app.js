require('./bootstrap')

import { createApp } from 'vue'
import router from './router'

import LinkIndex from './components/link/LinkIndex.vue'

createApp({
    components: {
        LinkIndex
    }
}).use(router).mount('#app')