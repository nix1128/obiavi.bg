import router from "./routes";
import VueRouter from "vue-router";
import Vue from "vue";
import Index from "./components/index.vue";

// require("./bootstrap");

window.Vue = require("vue").default;
Vue.use(VueRouter);

const app = new Vue({
    el: "#app",
    router,
    components: {
        index: Index
    },

    // beforeCreate() {
    //     console.log("before create");
    // },

    // created() {
    //     console.log("created");
    // },

    // beforeMount() {
    //     console.log("before Mount");
    // },

    // mounted() {
    //     console.log("Mounted");
    // },

    // beforeDestroy() {
    //     console.log("before destroy");
    // },

    // destroyed() {
    //     console.log("destroyed");
    // }
});
