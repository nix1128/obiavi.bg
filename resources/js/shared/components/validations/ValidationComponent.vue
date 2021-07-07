<template>
    <div>
        <div class="invalid-feedback" v-for="(error, key) in errors" :key="key">
            {{ error }}
        </div>
    </div>
</template>

<script>
export default {
    props: ["errors"],

};
</script>

<style scoped>
.form-control.is-invalid ~ div > .invalid-feedback {
    display: block;
}

.fa-3x.is-invalid ~ div > .invalid-feedback {
    display: block;
}
</style>
