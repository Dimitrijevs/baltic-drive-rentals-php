<template>
    <div class="col-lg-6">
        <div class="p-5 rounded-3 danger-light text-center">
            <i class="bi bi-people-fill text-black me-1 icon"></i>
            <p class="mt-2 h5">Users: <strong>{{ users }}</strong></p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        users: {
            type: Number,
            required: true,
        },
    },
};
</script>

<style scoped>
.danger-light {
    background-color: #f5c4c8;
}

.icon {
    font-size: 5rem;
}
</style>