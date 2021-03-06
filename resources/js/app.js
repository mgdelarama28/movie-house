/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import store from './store';
require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('movie-card', require('./components/MovieCard.vue').default);
Vue.component('movies-index', require('./views/movies/Index.vue').default);
Vue.component('movies-show', require('./views/movies/Show.vue').default);

Vue.component('tv-shows-index', require('./views/tv_shows/Index.vue').default);
Vue.component('tv-show-card', require('./components/TvShowCard.vue').default);
Vue.component('tv-shows-show', require('./views/tv_shows/Show.vue').default);

Vue.component('actors-index', require('./views/actors/Index.vue').default);
Vue.component('actors-show', require('./views/actors/Show.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
});
