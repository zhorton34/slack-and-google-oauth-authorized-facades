import Vue from 'vue'
import Vuex from 'vuex'
import store from './store'

Vue.use(Vuex)


require('spark-bootstrap');
require('./components/bootstrap');

var app = new Vue({
    store,
    mixins: [require('spark')]
});
