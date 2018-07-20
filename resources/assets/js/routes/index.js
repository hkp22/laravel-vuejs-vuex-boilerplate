import Vue from "vue";
import Router from 'vue-router';
// import routes from '../app/routes';
import {routes as routes} from '../app/index';


Vue.use(Router);

const router = new Router({
    routes: routes
});

export default router;