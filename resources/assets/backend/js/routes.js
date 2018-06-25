import Hello from './views/Hello'
import Home from './views/Home'
import UserIndex from './views/user/Index'
import UserCreate from './views/user/Create'
import UserUpdate from './views/user/Update'

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
            component: UserIndex,
        },
        {
            path: '/users/create',
            name: 'users.create',
            component: UserCreate,
        },
        {
            path: '/users/update/:id',
            name: 'users.update',
            component: UserUpdate,
        },
    ];

