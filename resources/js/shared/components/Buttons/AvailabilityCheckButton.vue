<template>
    <div>
        <button
           type="button" class="btn btn-primary btn-block"
            @click="$parent.check"
            :disabled="loading"
        >
            <span v-if="!loading"><slot></slot></span>

            <span v-if="loading">
                <i class="fas fa-circle-notch fa-spin"></i> Checking...
            </span>
        </button>
    </div>
</template>

<script>
export default {
    props: { loading: Boolean }
};
</script>
