<template>
    <div class="container">
  <div class="row ">
    <div class="col w-100">

        <div class="card p-4 mr-4 mt-4">

                <h2 class="card-title" >{{ listTitle }}</h2>
                <p class = "card-text ">{{ listContent }}</p>

                <p>Price: {{ price }}</p>

        </div>
    </div>
    </div>
    </div>
</template>

<script>
export default {
    props: { listTitle: String, listContent: String, price: Number }
};
</script>

<style scoped>
h2,p{

    text-align: center;
}

</style>
