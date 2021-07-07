<template>
    <div>
        <div
            v-for="(days, price) in price.breakdown"
            :key="price"
            class="p-2 pb-2 border-bottom border-top d-flex justify-content-between"
        >
            <span>Days: {{ days }} X ${{ price }}</span>
            <span>Price: {{ days * price }}</span>
        </div>
        <div class="pt-2 pb-2 d-flex justify-content-between">
            <span> Total Price:</span>
            <span>{{ price.total }}</span>
        </div>
        <div>{{title}}</div>
    </div>
</template>

<script>
export default {
    props: {
        price: Object,
        title:null,
    }
};
</script>
