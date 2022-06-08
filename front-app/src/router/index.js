import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
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
      path: '/Shop',
      name: 'shop',
      component: () => import('../views/ShopView.vue')
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
      path: '/Cart',
      name: 'Cart',
      component: () => import('../views/CartView.vue')
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
