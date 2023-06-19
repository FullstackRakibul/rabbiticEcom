// Components and Pages import list 

// page import 
import HomePage from '../pages/HomePage.vue';
import NotFoundPage from '../pages/NotFoundPage.vue';
import LoginPage from '../pages/auth/LoginPage.vue';
import RegisterPage from '../pages/auth/RegisterPage.vue';
import BlogPage from '../pages/BlogPage.vue';
import CategoryPage from '../pages/CategoryPage.vue';
import BrandPage from '../pages/BrandPage.vue'

// component import 
import BlogCard from "../components/BlogCard.vue";
import CategoryCard from "../components/CategoryCard.vue";
import BrandCard from '../components/BrandCard.vue';





// routes list

const routes =[
    {
        path: '/',
        name: 'homePage',
        component: HomePage
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
        path:"/blogs",
        name:'blogpage',
        component : BlogPage,
    },
    {
        path:"/blog/:id",
        name:"singleBlog",
        component:BlogCard,
    },
    {
        path:"/categories",
        name:"categories",
        component:CategoryPage,
    },
    {
        path:"/caregory/:id",
        name:"singelCategory",
        component:CategoryCard,
    },
    {
        path:"/brands",
        name:"brands",
        component:BrandPage,
    },
    {
        path:"/brand/:id",
        name:"singelBrand",
        component:BrandCard,
    },

]

export default routes;