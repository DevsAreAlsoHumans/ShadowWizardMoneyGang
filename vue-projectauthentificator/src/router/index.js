import { createWebHistory, createRouter } from "vue-router";
import MainHub from "@/views/MainHubPage.vue";
import RedirectMain from "@/components/RedirectMain.vue";
import RegisterVue from "@/views/RegisterVue.vue";
import LoginVue from "@/views/LoginVue.vue";


const routes = [
  {
    path: "/",
    name: "redirect",
    component: RedirectMain,
  },
  {
    path: "/mainHub",
    name: "mainHub",
    component: MainHub,
  },
  {
    path: "/register",
    name: "register",
    component: RegisterVue,
  },
  {
    path: "/login",
    name: "login",
    component: LoginVue,
  },
  // route dynamique pour rediriger la page d'accueil
  {
    path: "/:pathMatch(.*)*",
    redirect: { name: "mainHub" },
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
