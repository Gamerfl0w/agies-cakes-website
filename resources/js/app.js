/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import VueToastr from "vue-toastr";
Vue.use(VueToastr);
import { Errors, Form, Default } from 'vform';
window.Form = Form;
// Vue.component(HasError.name, HasError)
// Vue.component(AlertError.name, AlertError)


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('custom', require('./components/Customize.vue').default);
Vue.component('checkout', require('./components/Checkout.vue').default);
Vue.component('accept', require('./components/Accept.vue').default);
Vue.component('home', require('./components/Home.vue').default);
Vue.component('edit-home', require('./components/EditHome.vue').default);
Vue.component('change-role', require('./components/MakeAdmin.vue').default);
Vue.component('change-to-user', require('./components/MakeUser.vue').default);
Vue.component('change-status', require('./components/Status.vue').default);
Vue.component('sales', require('./components/Sales.vue').default);
Vue.component('delivery-btn', require('./components/Delivery.vue').default);
Vue.component('cake-modal', require('./components/CakeModal.vue').default);
Vue.component('search-products', require('./components/Products.vue').default);
Vue.component('add-rating', require('./components/Rating.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
