require('./bootstrap');

const Vue = require('vue');

window.Vue = Vue

import SearchComponent from './components/SearchComponent'

const app = new Vue({
    el: '#app',

    components: {
        SearchComponent
    },
});
