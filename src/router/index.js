// src/router/index.js
import { createRouter, createWebHistory } from "vue-router";
import Home from "@/views/Home.vue";
import Attractions from "@/views/Attractions.vue";
import Tickets from "@/views/Tickets.vue";
import Souvenirs from "@/views/Souvenirs.vue";
import Statistics from "@/views/Statistics.vue";
import Login from "@/views/Login.vue";
import Register from "@/views/Register.vue";

const routes = [
  { path: "/", name: "Home", component: Home },
  { path: "/attractions", name: "Attractions", component: Attractions },
  { path: "/tickets", name: "Tickets", component: Tickets },
  { path: "/souvenirs", name: "Souvenirs", component: Souvenirs },
  { path: "/statistics", name: "Statistics", component: Statistics },
  { path: "/login", name: "Login", component: Login },
  { path: "/register", name: "Register", component: Register }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
