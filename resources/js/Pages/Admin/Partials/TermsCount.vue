<template>
    <div class="col-lg-6">
        <div class="p-5 rounded-3 danger-light text-center">
            <i class="bi bi-file-earmark-ruled text-white me-1 icon"></i>
            <p class="mt-2 h5 text-white">Terms: <strong>{{ terms }}</strong></p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        terms: {
            type: Number,
            required: true,
        },
    },
};
</script>

<style scoped>
.danger-light {
    background-color: #000000;
}

.icon {
    font-size: 5rem;
}
</style>