import Vue from 'vue'
import store from './store'

require('spark-bootstrap');
require('./components/bootstrap');

import CreateJob from '@Component/jobs/forms/create'
Vue.component('create-job', CreateJob)


var app = new Vue({
    mixins: [require('spark')],
    store
});
