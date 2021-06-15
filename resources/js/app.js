import router from "./routes";
import VueRouter from "vue-router";
import Vue from "vue";
import Index from "./index.vue";
import Moment from "moment";
import Stars from "./shared/components/StarsComponent.vue";
import fatalError from "./shared/components/fatalError.vue";
import Validations from "./shared/components/validations/ValidationComponent.vue";
import Spiner from "./shared/Spiner/Spiner.vue";
import PortalVue from "portal-vue";
import Vuex from "vuex";
import storeState from "./store";

// require("./bootstrap");

// window.Vue = require("vue").default;
Vue.component("stars-rating", Stars), Vue.component("fatal-error", fatalError);
Vue.component("v-validation", Validations);
Vue.component("spiner", Spiner);
import BootstrapVue from "bootstrap-vue";

Vue.use(BootstrapVue);
Vue.use(VueRouter);
Vue.use(PortalVue);
Vue.use(Vuex);

Vue.filter("timeFilter", value => Moment(value).format("ll"));

const store = new Vuex.Store(storeState);

const app = new Vue({
    el: "#app",
    router,
    store,

    components: {
        index: Index
    },

    beforeCreate() {
        this.$store.dispatch("loadLastState");
    }

});


