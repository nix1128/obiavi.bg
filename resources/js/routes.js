import Home from "./HomeComponent/Home.vue";
import About from "./AboutComponent/About.vue";
import VueRouter from "vue-router";
import Adds from "./AddsComponent/AddsList.vue"
import SingleAdd from './SingleAddComponent/SingleAdd.vue'
import Review from './SingleAddComponent/Review.vue'

const routes = [
        {
            path: "/",
            component: Home,
            name: "home"
        },

        {
            path: "/about",
            component: About,
            name: "about"
        },

        {
            path: "/ads",
            component: Adds,
            name: "ads"
        },

        {
            path: "/ad/:id",
            component: SingleAdd,
            name: "ad"
        },





    ],


    router = new VueRouter({
        routes, // short for `routes: routes`
        mode: "history"
    });

export default router;
