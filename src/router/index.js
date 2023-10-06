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
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/students',
      name: 'students',
      component: () => import('../views/Students/View.vue')
    },
    {
      path: '/students/create',
      name: 'studentCreate',
      component: () => import('../views/Students/Create.vue')
    },
    {
      path: '/students/:id/edit',
      name: 'studentEdit',
      component: () => import('../views/Students/Edit.vue')
    },
  ]
})

export default router
