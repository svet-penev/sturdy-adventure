import Vue from 'vue'
import VueRouter from 'vue-router'
import Axios from 'axios';
import VueAxios from 'vue-axios';
import Home from './views/Home'
import Login from './views/layout/Login'
import UserIndex from './views/user/Index'
import UserCreate from './views/user/Create'
import UserUpdate from './views/user/Update'

let routes = [
       {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                auth: false
            }
        },
        {
            path: '/',
            name: 'home',
            component: Home,
            meta: {
                auth: true
            }
        },
        {
            path: '/users',
            name: 'users.index',
            component: UserIndex,
            meta: {
                auth: true
            }
        },
        {
            path: '/users/create',
            name: 'users.create',
            component: UserCreate,
            meta: {
                auth: true
            }
        },
        {
            path: '/users/update/:id',
            name: 'users.update',
            component: UserUpdate,
            meta: {
                auth: true
            }
        },
    ];


Vue.use(VueRouter);
Vue.use(VueAxios, Axios);

Vue.prototype.http = Axios;

Axios.defaults.baseURL = ENV.baseUrl;

/**
 * Init Routes
 */
window.router = new VueRouter({
    mode: 'history',
    routes: routes,
});

Vue.router = router;

/**
 * required Vue auth library
 */
Vue.use(require('@websanova/vue-auth'), {
    auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
    http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
    router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
});