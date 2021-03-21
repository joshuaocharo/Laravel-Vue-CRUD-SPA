import AllOrders from './components/AllOrders.vue';
import AddOrder from './components/AddOrder.vue';
//import EditBook from './components/EditBook.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllOrders
    },
    {
        name: 'addo',
        path: '/addo',
        component: AddOrder
    },
    {
        name: 'home',
        path: '/',
        component: AllSuppliers
    },
    {
        name: 'adds',
        path: '/adds',
        component: AddSupplier
    },
    {
        name: 'home',
        path: '/',
        component: AllProducts
    },
    {
        name: 'addp',
        path: '/addp',
        component: AddProduct
    },
    {
        name: 'home',
        path: '/',
        component: AllOrderDetails
    },
    {
        name: 'addod',
        path: '/addod',
        component: AddOrderDetail
    },
    {
        name: 'home',
        path: '/',
        component: AllSupplierProducts
    },
    {
        name: 'addsp',
        path: '/addsp',
        component: AddSupplierProduct
    }
];