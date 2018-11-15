
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


//Vue.component('subscribers-form', require('./components/SubscriberForm.vue'));
Vue.component('forecast-view', require('./Weather/Forecast.vue'));
Vue.component('subscribers-form', require('./Weather/SubscriberForm.vue'));
Vue.component('city-search', require('./Weather/Citysearch.vue'));

import SuiVue from 'semantic-ui-vue';
Vue.use(SuiVue); 

const app = new Vue({
    el: '#app'
});
