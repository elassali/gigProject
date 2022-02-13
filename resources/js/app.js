require('./bootstrap');
// ---------------------------------------
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();
window.Vue = require('vue').default;
// --------------------------------
//------------ Router ---------------
import VueRouter from 'vue-router'
import routes from './routes'
Vue.use(VueRouter)


//------------ Router ---------------


import App from '../vue/app';

const app = new Vue({
    el:"#app",
    router:new VueRouter(routes),
    components:{
        'gig-app': App
    }
})
