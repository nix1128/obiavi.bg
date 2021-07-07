<template>
    <div class="container">
        <div class="row ">
            <div class="col-md-12 w-100">
                <div class="card p-4 mr-4 mt-4">
                <router-link :to="{ name: 'ad', params: { id } }">
                    <h2 class="card-title">{{ addsTitle }}</h2>
                </router-link>


                    <p class="card-text ">{{ addsContent }}</p>

                    <p>{{ price }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        addsTitle: String,
        addsContent: String,
        price: Number,
        id: Number
    },



    data() {
        return {};
    }
};
</script>

<style scoped>
h2,
p {
    text-align: center;
}
</style>
