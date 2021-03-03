import Home from "./components/pages/Home";
import NotFound from "./components/errors/NotFound";

export default {
    mode: 'history',

    linkActiveClass: 'link-active',

    routes: [

        {
            path: '*',
            name: 'not_found',
            component: NotFound
        },
        {
            path: '/home',
            name: 'home',
            component: Home
        }

    ]
}

