/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import CKEditor from '@ckeditor/ckeditor5-vue'
import Vuelidate from 'vuelidate'

import store from './store/index'

// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)
Vue.use(CKEditor)
Vue.use(Vuelidate)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('series-list-component', require('./components/series/SeriesListComponent.vue').default);
Vue.component('series-details-component', require('./components/series/SeriesDetailsComponent').default);
Vue.component('alert-component', require('./components/AlertComponent.vue').default);
Vue.component('series-form-component', require('./components/forms/SeriesFormComponent.vue').default);
Vue.component('validation-errors-component', require('./components/ValidationErrorsComponent.vue').default);
Vue.component('categories-list-component', require('./components/category/CategoriesListComponent.vue').default);
Vue.component('category-form-component', require('./components/forms/CategoryFormComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    store,
    el: '#app',
});
