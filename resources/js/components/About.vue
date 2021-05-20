<template>
    <div>
        <div v-if="loading"><p>Page is loading...</p></div>
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
        setTimeout(() => {
            this.abouts = [
                {
                    title: "this is about title"
                },
                {
                    content: "this is about content"
                }
            ];
            this.loading = false;
        }, 2000);
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
