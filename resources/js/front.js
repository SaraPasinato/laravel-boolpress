require('./bootstrap');


window.axios = require('axios');
window.Vue = require('vue');

import App from './components/App.vue';

const app=new Vue({
    el:'#root',
    render: h => h(App) 
});