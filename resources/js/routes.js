import Home from "./components/Home.vue";
import About from "./components/About.vue";
import VueRouter from "vue-router";
import Lists from "./components/Listings/Lists.vue"

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
            path: "/lists",
            component: Lists,
            name: "lists"
        },

    ],


    router = new VueRouter({
        routes, // short for `routes: routes`
        mode: "history"
    });

export default router;
