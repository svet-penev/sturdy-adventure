import Vue from 'vue'

/**
 * Global data
 */
let globalData = new Vue({
    data: {
        $pageHeader: '',
        $pageBreadcrumb : []
    }
});

/**
 * Mixin
 */
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