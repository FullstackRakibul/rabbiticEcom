import "./bootstrap";
import { createApp } from "vue";
import Frontend from "./layouts/Frontend.vue";
import "../css/app.css";
import router from "./router/router.js";

import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";

const app = createApp(Frontend);

library.add(fas);

// .............

app.component("seticon", FontAwesomeIcon);

app.use(router);
app.mount("#app");
