window._ = require('lodash');
import VueRouter from 'vue-router';
import Form from './utilities/Form';

// import Vue from 'vue';
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.Vue = require('vue').default;
Vue.use(VueRouter);
// window.Vue = require('Vue');
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Form = Form;