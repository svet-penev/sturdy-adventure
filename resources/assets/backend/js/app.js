require('./routes');

import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './views/layout/App'

Vue.use(VueRouter)

Vue.component('top-bar-component', require('./components/layout/TopBarComponent.vue'));
Vue.component('menu-component', require('./components/layout/MenuComponent.vue'));
Vue.component('page-header-component', require('./components/layout/PageHeaderComponent.vue'));

const router = new VueRouter({
    mode: 'history',
    routes: routes,
});

let globalData = new Vue({
    data: { $pageHeader: '' }
});
Vue.mixin({
    computed: {
        $pageHeader: {
            get: function () { return globalData.$data.$pageHeader },
            set: function (newPageHeader) { globalData.$data.$pageHeader = newPageHeader; }
        }
    }
})


export const app = new Vue({
    el: '#app',
    components: { App },
    router
});