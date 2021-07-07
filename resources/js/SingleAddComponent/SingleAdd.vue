<template>
    <div>
        <div class="container d-flex flex-row mw-100">
            <div class="card ">
                <review-list :ad-id="this.$route.params.id" />
            </div>
            <div class="col-md-6 mx-auto ">
                <div class="card ">
                    <div class="card-body">
                        <div v-if="!loading">
                            <h2>{{ ad.title }}</h2>

                            <hr />
                            <article>{{ ad.content }}</article>
                            <hr />

                            <p class="flex-row text-center">
                                Starts from : {{ ad.price }}
                            </p>
                        </div>

                        <div v-else>
                            Loading...
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 pb-4  ">
                <availability
                    :ad-id="this.$route.params.id"
                    @availability="priceSet($event)"
                >
                </availability>


                <transition name="fade">
                    <price-breakdown
                        v-if="price"
                        :price="price"
                    ></price-breakdown>
                </transition>

                <transition name="fade">
                    <button
                        type="button"
                        class="btn btn-outline-secondary btn-block "
                        v-if="price"
                        @click="addToCart"
                        :disabled="alreadyInCart"
                    >
                        Book now!
                    </button>


                </transition>
                <br>

                     <transition name="fade">

                        <button
                        type="button"
                        class="btn btn-outline-secondary btn-block"
                        v-if="alreadyInCart"
                        @click="removeFromCart"
                    >
                        Remove from Cart!
                    </button>

 </transition>

                <transition name="fade">
                    <div
                        v-if="alreadyInCart"
                        class="mt-2 mb-2 text-muted warning"
                    >
                        It appears that you already have this item in your Cart. To change dates,
                        ,please, remove it first!
                    </div>
                </transition>
            </div>
        </div>
    </div>
</template>

<script>
import ReviewList from "../ReviewsComponent/ReviewList";
import PriceBreakdown from "../PriceComponent/PriceBreakdown";
import Availability from "./Availability";
import { mapState } from "vuex";

import axios from "axios";

export default {
    components: {
        Availability,
        ReviewList,
        PriceBreakdown
    },
    data() {
        return {
            ad: null,
            loading: false,
            price: null
        };
    },

    computed: {
        ...mapState({
            lastSearchState: "lastSearchState",

            alreadyInCart(state) {
                if (null === this.ad) {
                    return false;
                }
                //reduce - sum all values into a single one
                return state.cart.items.reduce(
                    (result, item) => result || item.ads.id === this.ad.id,
                    false
                );
            }
        })
    },

    created() {
        this.loading = true;
        const request = axios.get(`/api/ad/${this.$route.params.id}`);

        request.then(response => {
            this.ad = response.data.data;

            this.loading = false;
        });
    },

    methods: {
        async priceSet(hasAvailability) {
            if (!hasAvailability) {
                this.price = null;
                return;
            }

            try {
                this.price = (
                    await axios.get(
                        // takse tbe path with id and the last state from to stored in local storage 'manageState'
                        `/api/ad/${this.$route.params.id}/price?from=${this.lastSearchState.from}&to=${this.lastSearchState.to}`
                    )
                ).data.data;
            } catch (error) {
                this.price = null;
            }
        },
        addToCart() {
            this.$store.dispatch("addToCart", {
                ads: this.ad,
                price: this.price,
                dates: this.lastSearchState
            });
        },
        removeFromCart(){
            this.$store.dispatch ("removeFromCart", this.ad.id)
        }

        // console.log(hasAvailability);
    }
};
</script>

<style scoped>
h2,
article {
    text-align: center;
}

.warning {
    font-size: 0.7rem;
}
</style>
