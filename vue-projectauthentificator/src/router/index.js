import { createWebHistory, createRouter } from "vue-router"
import MainHub from "@/views/MainHubPage.vue"
import Redirect from "@/components/RedirectMain.vue"

const routes = [
  {
    path: "/",
    name: "redirect",
    component: Redirect,
  },
  {
    path: "/mainHub",
    name: "mainHub",
    component: MainHub,
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router