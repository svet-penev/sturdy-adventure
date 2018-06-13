import Hello from './views/Hello'
import Home from './views/Home'
import UsersIndex from './views/UsersIndex'

window.routes = [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/hello',
            name: 'hello',
            component: Hello,
        },
        {
            path: '/users',
            name: 'users.index',
            component: UsersIndex,
        },
    ];

