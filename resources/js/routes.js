import Home from "./components/pages/Home";
import NotFound from "./components/errors/NotFound";
import EditBook from "./components/book/EditBook";
import AddBook from "./components/book/AddBook";

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
        },
        {
            path: '/book/edit/:id',
            name: 'book.edit',
            component: EditBook,
            props: true,
        },

    ]
}

