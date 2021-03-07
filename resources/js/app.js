/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */
import Vue from 'vue';

import App from './app.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import routes from "./routes";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import Vuetify from 'vuetify';
import 'bootstrap-table/dist/bootstrap-table.css';
require('bootstrap-table');
require('./bootstrap');
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(VueSweetalert2);
Vue.use(Vuetify);
window.axios = require('axios');
import VueHtmlToPaper from 'vue-html-to-paper';
/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const options = {
    name: '_blank',
    specs: [
        'fullscreen=yes',
        'titlebar=yes',
        'scrollbars=yes'
    ],
    styles: [
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
        'https://unpkg.com/kidlat-css/css/kidlat.css'
    ]
}

require('./components/Example');
window.Vue = require('vue');
 const app = new Vue({
    el: '#app',
     components: { App },
    router: new VueRouter(routes),
    vuetify: new Vuetify(),
});

Vue.use(VueHtmlToPaper, options);

// or, using the defaults with no stylesheet
Vue.use(VueHtmlToPaper);
