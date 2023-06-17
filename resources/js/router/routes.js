// Components and Pages import list

import HomePage from "../pages/HomePage.vue";
import BlogPage from "../pages/BlogPage.vue";
import NotFoundPage from "../pages/NotFoundPage.vue";

import LoginPage from "../pages/auth/LoginPage.vue";
import RegisterPage from "../pages/auth/RegisterPage.vue";

// routes list

const routes = [
    {
        path: "/",
        name: "homePage",
        component: HomePage,
    },
    {
        path: "/:pathMatch(.*)*",
        name: "notFoundPage",
        component: NotFoundPage,
    },
    {
        path: "/login",
        name: "loginPage",
        component: LoginPage,
    },
    {
        path: "/register",
        name: "registerPage",
        component: RegisterPage,
    },
    {
        path: "/blog",
        name: "blogPage",
        component: BlogPage,
    },
];

export default routes;
