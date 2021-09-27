/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

const Home = require('./pages/Home.vue').default
const About = require('./pages/About.vue').default
const Login = require('./pages/Login.vue').default
const Register = require('./pages/Register.vue').default
const Dashboard = require('./pages/Dashboard.vue').default
const NotFound = require('./pages/NotFound.vue').default

Vue.use(VueRouter)


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const routes = [
    {
        path: '*' ,
        component: NotFound
    },
    {
        path: '/' ,
        component: Home
    },
    {
        path: '/about' ,
        component: About
    },
    {
        path: '/register' ,
        component: Register
    },
    {
        path: '/login' ,
        component: Login
    },
    {
        path: '/dashboard' ,
        component: Dashboard,
        name: 'Dashboard',
    },
]

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'font-weight-bold',
    routes
})


const app = new Vue({
    el: '#app',
    router
});
