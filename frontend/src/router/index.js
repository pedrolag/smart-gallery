import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import('../views/home/Index.vue')
  },
  {
    path: '/gallery',
    name: 'Gallery',
    component: () => import('../views/gallery/Index.vue')
  },
  {
    path: '/category',
    name: 'Category',
    component: () => import('../views/category/Index.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
