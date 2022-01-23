require('./bootstrap');

import Vue from 'vue';
import AppApp from '../vue/app'

const App = new Vue({
    el:"#app",
    components:{
        AppApp
    }
})


