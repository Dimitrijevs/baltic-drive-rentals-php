<template>
    <div class="col-lg-6">
        <div class="p-5 rounded-3 danger-light text-center">
            <i class="bi bi-chat-left-dots-fill text-black me-1 icon"></i>
            <p class="mt-2 h5">Written comments: <strong>{{ comments }}</strong></p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        comments: {
            type: Number,
            required: true,
        },
    },
};
</script>

<style scoped>
.danger-light {
    background-color: #f0b26a;
}

.icon {
    font-size: 5rem;
}
</style>