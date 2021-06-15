<template>
    <div>
        <i
            class="fas fa-star"
            v-for="star in fullStar"
            :key="'star' + star"
            @click="$emit('add:star', + star )"
        ></i>
        <i class="fas fa-star-half-alt" v-if="halfStar"></i>
        <i
            class="far fa-star"
            v-for="star in noStar"
            :key="'nostar' + star"
            @click="$emit('add:star', + star + fullStar)"

        ></i>
        <!-- emits to Leave review page -->
    </div>
</template>

<script>
export default {
    props: {
        rating: Number //pased from ReviwesPage & Reviews List
    },
    data() {
        return {};
    },

    computed: {
        noStar() {
            //5.6 = 6
            return 5 - Math.ceil(this.rating);
        },

        halfStar() {
            //floor <.
            const calc = (this.rating - Math.floor(this.rating)) * 100;

            return calc > 0 && calc < 50;
        },

        fullStar() {
            //9.5 = 10, 9.4 = 9
            return Math.round(this.rating);
        }
    }

    // created() {
    //     const numbers = [0.9,0.8,1.0,1.5,1.3,4.6, 4.9, 5.5, 7.2, 8.7, 9.2, 9.9];

    //     numbers.forEach( n => {
    //         console.log(`round for ${n} is ${Math.round(n)}`);
    //         console.log(`floor for ${n} is ${Math.floor(n)}`);
    //         console.log(`ceil for ${n} is ${Math.ceil(n)}`);
    //          console.log(`------------------------------------`);

    //     });

    // },
};
</script>
