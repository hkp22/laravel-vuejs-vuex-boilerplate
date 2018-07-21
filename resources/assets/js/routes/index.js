import Vue from "vue";
import Router from "vue-router";
// import routes from '../app/routes';
import { routes } from "../app/index";
import beforeEach from "./beforeEach";

Vue.use(Router);

const router = new Router({
  mode: "history",
  routes: routes
});

router.beforeEach(beforeEach);

export default router;
