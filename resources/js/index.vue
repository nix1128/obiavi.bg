<template>
    <div>
        <div class="navbar border-bottom " style="color: #563d7c">
            <router-link class="navbar-brand mr-auto" :to="{ name: 'home' }"
                >Home</router-link
            >
            <router-link class="btn nav-button" :to="{ name: 'about' }"
                >About</router-link
            >
            <router-link class="btn nav-button" :to="{ name: 'ads' }"
                >Lists</router-link
            >
            <router-link v-if="addedToCart" :to="{ name: 'cart' }">
                <span class="btn btn-primary">
                    Cart
                    <span class="badge badge-light">{{ addedToCart }}</span>
                </span></router-link
            >
        </div>

        <div class="mt-4 mr-4 pr-4 pl-4">
            <router-view />
        </div>
    </div>
</template>

<script>
import { mapState, mapGetters } from "vuex";
import Cart from './CartComponent/Cart'
export default {
     components:{
            Cart
        },

    data() {

        return {
            // lastState: this.$store.state.manageState
        };
    },

    computed: {
        ...mapState({
            lastState: "lastSearchState",


        }),
        ...mapGetters({
            addedToCart: "addedToCart"
        })
    }
};
</script>
