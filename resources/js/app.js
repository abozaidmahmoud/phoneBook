/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

let myheader = require('./components/myheader.vue').default;
let myfooter = require('./components/myfooter.vue').default;

let Home = require('./components/home.vue').default;
let About = require('./components/about.vue').default;

const routes = [
    { path: '/home', component: Home },
    { path: '/about', component: About }
]


const router = new VueRouter({
    routes // short for `routes: routes`
})


const app = new Vue({
    el: '#app',
    router,
    components: {
        myheader,
        myfooter
    },





})