import './bootstrap';
import {createApp} from 'vue';
import Frontend from './layouts/Frontend.vue';
import '../css/app.css';
import router from './router/router.js'


const app = createApp(Frontend);

// .............

app.use(router);
app.mount('#app');
