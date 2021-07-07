import axios from "axios";
import { isLoggedIn, logOut } from "./shared/utils/userState";

export default {
    state: {
        lastSearchState: {
            from: null,
            to: null
        },

        cart: {
            items: []
        },

        isLoggedIn: false,

        user: {}
    },
    mutations: {
        manageStateMutation(state, result) {
            state.lastSearchState = result;
        },

        addToCart(state, result) {
            state.cart.items.push(result);
        },
        removeFromCart(state, result) {
            state.cart.items = state.cart.items.filter(
                item => item.ads.id !== result
            );
        },

        //setCart sets all the items
        // setCart(state , payload){
        //     state.cart = payload;

        // }

        setUser(state, payload) {
            state.user = payload;
        },
        setLoggedIn(state, payload) {
            state.isLoggedIn = payload;
        }
    },

    actions: {
        manageStateMutation(context, result) {
            context.commit("manageStateMutation", result);
            localStorage.setItem("localState", JSON.stringify(result)); // saved as json
        },

        loadLastState(context) {
            const getState = localStorage.getItem("localState");
            if (getState) {
                context.commit("manageStateMutation", JSON.parse(getState)); // get as json
            }

            const cart = localStorage.getItem("cart");
            if (cart) {
                context.commit("setCart", JSON.parse(cart));
            }

            // context.commit("setLoggedIn", isLoggedIn());
        },

        addToCart(context, result) {
            // content has state & commit
            context.commit("addToCart", result);
            localStorage.setItem("cart", JSON.stringify(result));
        },

        removeFromCart() {
            context.commit("removeFromCart", result);
            localStorage.setItem("cart", JSON.stringify(result));
        },

        async loadUser({ commit, dispatch }) {
            if (isLoggedIn()) {
                try {
                    const user = (await axios.get("/user")).data;
                    commit("setUser", user);
                    commit("setLoggedIn", true);
                } catch (error) {
                    dispatch("logout");
                }
            }
        },
        logout({ commit }) {
            commit("setUser", {});
            commit("setLoggedIn", false);
            logOut();
        }
    },

    getters: {
        addedToCart: state => state.cart.items.length

        //     alreadyInCart(state) {
        //         return function(id)
        //         {
        //             return state.cart.items.reduce(
        //                 (result, item) => {
        //             result || item.ad.id == id, false;}

        //         );
        //     }
        // }
    }
};
