import VueRouter from 'vue-router'

import AllOrders from './components/AllOrders.vue';
import AddOrder from './components/AddOrder.vue';
import EditOrder from './components/EditOrder.vue';
import AllOrderDetails from './components/AllOrderDetails.vue';
import AddOrderDetail from './components/AddOrderDetail.vue';
import EditOrderDetail from './components/EditOrderDetail.vue';
import AllProducts from './components/AllProducts.vue';
import AddProduct from './components/AddProduct.vue';
import EditProduct from './components/EditProduct.vue';
import AllSuppliers from './components/AllSuppliers.vue';
import AddSupplier from './components/AddSupplier.vue';
import EditSupplier from './components/EditSupplier.vue';
import AllSupplierProducts from './components/AllSupplierProducts.vue';
import AddSupplierProduct from './components/AddSupplierProduct.vue';
import EditSupplierProduct from './components/EditSupplierProduct.vue';
import Home from './pages/Home'
import Register from './pages/Register'
import Login from './pages/Login'
import Dashboard from './pages/user/Dashboard'
import AdminDashboard from './pages/admin/Dashboard'

const routes = [
    {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      auth: undefined
    }
  },
  {
    path: '/register',
    name: 'register',
    component: Register,
    meta: {
      auth: false
    }
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: {
      auth: false
    }
  },
  // USER ROUTES
  {
    path: '/dashboard',
    name: 'dashboard',
    component: Dashboard,
    meta: {
      auth: true
    }
  },
  // ADMIN ROUTES
  {
    path: '/admin',
    name: 'admin.dashboard',
    component: AdminDashboard,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
    {
        name: 'addo',
        path: '/addo',
        component: AddOrder
    },
    
    {
        name: 'adds',
        path: '/adds',
        component: AddSupplier
    },
   
    {
        name: 'addp',
        path: '/addp',
        component: AddProduct
    },
   
    {
        name: 'addod',
        path: '/addod',
        component: AddOrderDetail
    },
    
    {
        name: 'addsp',
        path: '/addsp',
        component: AddSupplierProduct
    },
]

const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,
})
export default router