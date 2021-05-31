<template>
    <div>
        <div class="container d-flex flex-row mw-100">
            <div class="card ">
                <review :ad-id ="this.$route.params.id"/>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="card ">
                    <div class="card-body">
                        <br />
                        <br />

                        <div v-if="!loading">
                            <h2>{{ ad.title }}</h2>

                            <hr />
                            <article>{{ ad.content }}</article>
                        </div>

                        <div v-else>
                            Loading...
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 pb-4 ">
                <availability :ad-id ="this.$route.params.id" />
            </div>
        </div>
    </div>
</template>

<script>
import Review from "./Review";
import Availability from "./Availability";
import axios from "axios";
export default {
    components: {
        Availability,
        Review
    },
    data() {
        return {
            ad: null,
            loading: false
        };
    },

    created() {
        this.loading = true;
        const request = axios.get(`/api/ad/${this.$route.params.id}`);
        request.then(response => {
            this.ad = response.data.data;
            this.loading = false;
        });
    }
};
</script>

<style scoped>
h2,
article {
    text-align: center;
}
</style>
