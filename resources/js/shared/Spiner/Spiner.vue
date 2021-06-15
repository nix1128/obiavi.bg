<template>
    <div>
        <div class="text-center">
            <b-spinner


                style="width: 3rem; height: 3rem;"

                label="Large Spinner"
                type="grow"
                variant="success"
            ></b-spinner>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            variants: [
                "primary",
                "secondary",
                "danger",
                "warning",
                "success",
                "info",
                "light",
                "dark"
            ]
        };
    }
};
</script>

<style scoped>


</style>
