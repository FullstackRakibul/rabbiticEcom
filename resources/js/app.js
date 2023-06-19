import './bootstrap';
import {createApp} from 'vue';
import Frontend from './layouts/Frontend.vue';
import '../css/app.css';
import router from './router/router.js'



// font awesome icon and libs imports
/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
/* import specific icons */
import { fas } from '@fortawesome/free-solid-svg-icons'
// import ends here 

const app = createApp(Frontend);

/* add icons to the library */
library.add(fas);

// .............

app.component("icon", FontAwesomeIcon);
app.use(router);
app.mount('#app');
