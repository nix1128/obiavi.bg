<template>
    <div class="container">
        <div>
            <div class="text-center message" v-if="sent">
                Thank you for your rating!
            </div>
            <div v-else>
                <div class = "container" v-if="loading"><spiner></spiner></div>

                <div v-else>

                    <div v-if="notExistingReview">
                        <div class="d-flex flex-row mw-100">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <router-link
                                            :to="{
                                                name: 'ad',
                                                params: {
                                                    id: addetails_id.ads.id
                                                }
                                            }"
                                            >{{
                                                addetails_id.ads.title
                                            }}</router-link
                                        >
                                    </h4>
                                    <p class="card-text">
                                        <router-link
                                            :to="{
                                                name: 'ad',
                                                params: { id: addetails_id.ads }
                                            }"
                                        />{{ addetails_id.ads.content }}
                                    </p>
                                    <p class="card-row">
                                        From {{ addetails_id.from }} T0:{{
                                            addetails_id.to
                                        }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-md-6 p-2 text-muted">
                                Please give your rating with stars from
                                1-5</label
                            >
                            <stars-rating
                                class="fa-3x"
                                :rating="review.rating"
                                v-on:add:star="review.rating = $event"
                                :class="[{'is-invalid': errorFor('rating') }]"
                            >
                            </stars-rating>


                        </div>

                        <div class="form-group">
                            <label for="content">
                                Describe your experience</label
                            >
                            <textarea
                                name="content"
                                cols="30"
                                rows="10"
                                class="form-control"
                                v-model="review.content"
                                :class="[{'is-invalid': errorFor('content') }]"
                            ></textarea>

                            <v-validation :errors="errorFor('content')"></v-validation >

                        </div>



                        <button
                            :disabled="loading"
                            class="btn btn-primary btn-lg btn-block"
                            @click.prevent="submit"
                        >
                            Send
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center message" v-if="existingReview">
            You have already left a review for this object
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { is404,is422 } from "../shared/components/validations/Errors";


export default {

    data() {
        return {
            review: {
                id: null,
                rating: null,
                content: null
            },

            created_at: null,
            loading: false,
            addetails_id: null,
            sent: false,
            errors: null,
            status: null
        };
    },

    created() {
        this.review.id = this.$route.params.id;
        this.loading = true;
        axios
            .get(`/api/review/${this.review.id}`)
            .then(response => {
                this.created_at = response.data.data;
            })

            .catch(err => {
                if (is404(err)) {
                    return axios
                        .get(`/api/ad-details-id/${this.review.id}`)

                        .then(response => {
                            this.addetails_id = response.data.data;
                        })
                        .catch(err => {
                            if (is404(err));
                        });
                }
            })
            .then(() => {})
            .catch(err => {});
        this.loading = false;
    },

    computed: {
        existingReview() {
            return this.created_at !== null;
        },
        notExistingReview() {
            return this.created_at == null;
        }
    },

    methods: {
        submit() {
            this.errors = null;
            this.loading = true;
            axios
                .post(`/api/review`, this.review)
                .then(response => (this.sent = true))
                .catch(err => {
                    if (is422(err)) {
                        this.errors = err.response.data.errors;
                    }
                    this.status = err.response.status;
                })
                .then((this.loading = false));
        },

        errorFor(field) {
            return this.errors ? this.errors[field] : null;
        }
    }
};
</script>

<style scoped>
.message {
    font-size: 2rem;
    color: gray;
}

.loading {
    font-size: 2rem;
    color: gray;
}

.is-invalid {
    border-color: #b22222;
    background-image: none;
}

.invalid-feedback {
    color: #b22222;
}



</style>
