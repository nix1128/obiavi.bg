<template>
    <div class = "container" v-if="loading"><p>Loading...</p></div>
    <div v-else>
        <div v-if="adds != null">
            <adds-child-component
v-for="(add, index) in adds" :key="index"

                :adds-title="add.title"
                :adds-content="add.content"
                :price="add.price"
                :id ="add.id"


            />
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import AddsChildComponent from './AddsChildComponent';


export default {
    components: {
      AddsChildComponent


    },

    data() {
        return {

            loading: false,

        };
    },

    created() {

this.loading = true;
    const request = axios.get('api/ads')

    request.then(response=>{
        this.adds = response.data.data;
        this.loading = false;
    })
     }


 };
</script>

<style scoped>

</style>
