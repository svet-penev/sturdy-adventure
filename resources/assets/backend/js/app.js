require('./const');
require('./routes');
require('./component');
require('./mixin');

import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import App from './views/layout/App'
import Notifications from 'vue-notification'


/**
 * Import libraries
 */
Vue.use(BootstrapVue);
Vue.use(Notifications);


/**
 * Init Vue
 */
export const app = new Vue({
    el: '#app',
    components: { App },
    router 
});

