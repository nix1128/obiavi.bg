<template>
    <div class="col-mb-4 p-4" style="pading:1.25rem">
        <h6
            class=" text-uppercase text-secondary font-weight-bolder pt-2 text-center"
        >
            Review list
        </h6>
        <hr />
        <div v-if="loading">Loading...</div>
        <div v-else >
        <div
            class="border-bottom d-none d-md-block"
            v-for="(review, index) in reviews"
            :key="index"
        >
            <div class="row pt-2">
                <div class="col-md-6">Nix Sabev</div>
                <div class="col-md-6">Star Rating: {{review.rating}}</div>

                <div class="col-md-12">Added On : {{review.created_at}}</div>
                <div class="row pt-4 pb-4">
                    <div class="col md-12">
                        <div class="col">" {{ review.content }} "</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props:{
        adId:String,
    },

    data() {
        return {
            loading: false,
            reviews: null,
            rating: null
        };
    },

    created() {
        this.loading = true;
         axios.get(`/api/ad/${this.adId}/reviews`).then(
            response => this.reviews = response.data.data)
            .then(()=> this.loading = false)




    }
};
</script>
