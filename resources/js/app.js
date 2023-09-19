import { createApp } from 'vue';
import App from '../views/App.vue';
import router from '../router';
import axios from 'axios';
axios.defaults.withCredentials = true;

const app = createApp(App);

app.use(router);
app.mount('#app');
