<template>
    <div>
        <div  v-if="loading"><spiner></spiner></div>
        <div v-else>
            <div v-for="(about, index) in abouts" :key="index">
                <h1>{{ about.title }}</h1>
                <p>{{ about.content }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            abouts: null,
            loading: false
        };
    },

    created() {
        this.loading = true;

            this.abouts = [
                {
                    title: "this is about title"
                },
                {
                    content: "this is about content"
                }
            ];
            this.loading = false;

    },
    mounted() {
        console.log("About component mounted.");
    }
};
</script>

<style scoped>
p,
h1 {
    text-align: center;
}
</style>
