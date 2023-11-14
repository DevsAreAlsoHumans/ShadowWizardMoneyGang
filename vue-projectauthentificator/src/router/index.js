import { createWebHistory, createRouter } from "vue-router";
import MainHub from "@/views/MainHubPage.vue";
import RedirectMain from "@/components/RedirectMain.vue";

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
