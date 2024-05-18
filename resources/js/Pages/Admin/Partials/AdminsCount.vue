<template>
    <div class="col-lg-6">
        <div class="p-5 rounded-3 info-light text-center">
            <i class="bi bi-person-lock text-black icon"></i>
            <p class="mt-2 h5">Admins: <strong>{{ admins }}</strong></p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        admins: {
            type: Number,
            required: true,
        },
    },
};
</script>

<style scoped>
.info-light {
    background-color: #78f1fa;
}

.icon {
    font-size: 5rem;
}
</style>