<template>
    <div class="col-lg-6">
        <div class="p-5 rounded-3 shadow text-center">
            <i class="bi bi-car-front-fill text-info icon"></i>
            <h1 class="mb-0"><strong>{{ cars }}</strong></h1>
            <p class="mt-0 h5">Cars</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        cars: {
            type: Number,
            required: true,
        },
    },
};
</script>

<style scoped>
.icon {
    font-size: 4rem;
}
</style>