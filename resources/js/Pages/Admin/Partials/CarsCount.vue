<template>
    <div class="col-lg-6">
        <div class="p-5 rounded-3 warning-light text-center">
            <i class="bi bi-car-front-fill text-black icon"></i>
            <p class="mt-2 h5">Cars: <strong>{{ cars }}</strong></p>
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
.warning-light {
    background-color: #fcea85;
}

.icon {
    font-size: 5rem;
}
</style>