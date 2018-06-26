require('./routes');

import Vue from 'vue'
import VueRouter from 'vue-router'
import BootstrapVue from 'bootstrap-vue'
import App from './views/layout/App'
import Notifications from 'vue-notification'

Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(Notifications);

Vue.component('top-bar-component', require('./components/layout/TopBarComponent.vue'));
Vue.component('menu-component', require('./components/layout/MenuComponent.vue'));
Vue.component('page-header-component', require('./components/layout/PageHeaderComponent.vue'));

const router = new VueRouter({
    mode: 'history',
    routes: routes,
});

let globalData = new Vue({
    data: {
        $pageHeader: '',
        $pageBreadcrumb : []
    }
});

Vue.mixin({
    computed: {
        $pageHeader: {
            get: function () { return globalData.$data.$pageHeader },
            set: function (newPageHeader) { globalData.$data.$pageHeader = newPageHeader; }
        },
        $pageBreadcrumb: {
            get: function () { return globalData.$data.$pageBreadcrumb },
            set: function (newPageBreadcrumb) { globalData.$data.$pageBreadcrumb = newPageBreadcrumb; }
        }
    },
    methods: {
        buildTableColumns: function (items, columns) {
            let newData = [];
            items.forEach((value) => {
                let item = {};
                columns.forEach((column) => {
                    item[column] = value[column];
                });
                item.action = value.id;
                newData.push(item);
            });
            
            return newData;
        }
    }
});

export const app = new Vue({
    el: '#app',
    components: { App },
    router
});