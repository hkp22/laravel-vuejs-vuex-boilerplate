import Vue from "vue";
import Router from "vue-router";
// import routes from '../app/routes';
import { routes } from "../app/index";
import beforeEach from "./beforeEach";

Vue.use(Router);

const router = new Router({
  routes: routes
});

router.beforeEach(beforeEach);

export default router;
