require('./bootstrap');

import Alpine from 'alpinejs';
window.Alpine = Alpine;

Alpine.start();
window.Vue = require('vue').default;

import App from '../vue/app';

const app = new Vue({
    el:"#app",
    components:{
        'gig-app':App
    }
})
