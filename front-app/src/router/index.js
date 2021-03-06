import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [


    {
      path: '/',
      redirect: 'home',
      component: () => import('../components/Header.vue'),
      children: [

        {
          path: '/',
          name: 'home',
          component: () => import('../views/HomeView.vue')
        },
        {
          path: '/about',
          name: 'about',
          component: () => import('../views/AboutView.vue')
        },
        {
          path: '/register',
          name: 'register',
          component: () => import('../views/Register.vue')
        },
        {
          path: '/login',
          name: 'login',
          component: () => import('../views/Login.vue')
        },
        {
          path: '/shop/:category',
          name: 'shop',
          component: () => import('../views/ShopView.vue')
        },
        {
          path: '/shop/',
          name: 'shops',
          component: () => import('../views/ShopView.vue')
        },
        {
          path: '/mystore',
          name: 'mystore',
          component: () => import('../views/StoreView.vue')
        },
        {
          path: '/ProductDetails/:id',
          name: 'ProductDetails',
          component: () => import('../views/ProductDetailsView.vue')
        },
        {
          path: '/AddProduct',
          name: 'AddProduct',
          component: () => import('../views/AddProductView.vue')
        },
        {
          path: '/UpdateProduct/:id',
          name: 'UpdateProduct',
          component: () => import('../views/UpdateProductView.vue')
        },
        {
          path: '/Cart',
          name: 'Cart',
          component: () => import('../views/CartView.vue')
        },
      ]
    },
    //admin
    {
      path: '/AdminLogin',
      name: 'AdminLogin',
      component: () => import('../views/Admin/Login.vue')
    },
    {
      path: '/ADMIN/users',
      name: 'ADMIN',
      component: () => import('../views/Admin/DashboardAdmin.vue')
    },
    {
      path: '/ADMIN/products',
      name: 'ADMIN_p',
      component: () => import('../views/Admin/DashboardAdmin.vue')
    },
    {
      path: '/test',
      name: 'test',
      component: () => import('../views/Admin/test.vue')
    },
    {
      path: '/logout',
      name: 'logout',
    },
    {
      path: '/profile',
      name: 'profile',
    },
    {
      path: '/profile/:id',
      name: 'profile-id',
    }
  ]
})

export default router
