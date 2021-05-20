<template>
    <div v-if="loading"><p>Page is loading...</p></div>
    <div v-else>
        <div v-if="lists != null">
            <single-list-item
                v-for="(list, index) in lists"
                :key="index"
                :list-title="list.title"
                :list-content="list.content"
                :price="list.price"
            />
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import SingleListItem from "./SingleListItem";

export default {
    components: {
        SingleListItem
    },

    data() {
        return {
            lists: null,
            loading: false,
            colums: 3
        };
    },

    created() {


    const reguest = axios.get('api/ads')

    reguest.then(response=>{
        this.lists = response.data;
        this.loading = false;
    })
     }


 };
</script>

<style scoped>

</style>
