import Home from "./components/pages/Home";
import NotFound from "./components/errors/NotFound";
import EditBook from "./components/book/EditBook";
import AddBook from "./components/book/AddBook";
import AddInvoice from "./components/invoice/AddInvoice";
import Invoices from "./components/invoice/Invoices";

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
            path: '/book/add',
            name: 'book.add',
            component: AddBook,
            props: true,
        },
        {
            path: '/book/edit/:id',
            name: 'book.edit',
            component: EditBook,
            props: true,
        },
        {
            path: '/invoices',
            name: 'invoices',
            component: Invoices,
            props: true,
        },
        {
            path: '/invoice/add',
            name: 'invoice.add',
            component: AddInvoice,
            props: true,
        },

    ]
}

