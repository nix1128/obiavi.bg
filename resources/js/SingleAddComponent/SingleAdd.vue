<template>
    <div class="container">
        <div class="col-sm-12 w-100">
            <div class="card ">
                <div class="card-body">
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
    </div>
</template>

<script>
import axios from "axios";
export default {
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
