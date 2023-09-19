import { createRouter, createWebHistory } from 'vue-router';
import routes from '../router/routes';
import { Modal } from 'usemodal-vue3';


const router = createRouter({
  history: createWebHistory(),
  routes,
});
export default router;
