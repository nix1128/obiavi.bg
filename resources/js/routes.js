import ExampleComponent from "./components/ExampleComponent.vue"
import  VueRouter from "vue-router"

   const routes = [
    {
path: "/",
component: ExampleComponent,
name: "home",

    }
],


 router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history',
  })

  export default router;
