<template>
    <div class="col-lg-6">
        <div class="p-5 rounded-3 danger-light text-center">
            <i class="bi bi-bank text-black me-1 icon"></i>
            <p class="mt-2 h5">Money earned: <strong>{{ moneyDividedBy100 }}k €</strong></p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        money: {
            type: Number,
            required: true,
        },
    },
    computed: {
        moneyDividedBy100() {
            return this.money / 100;
        }
    }
};
</script>

<style scoped>
.danger-light {
    background-color: #6bda61;
}

.icon {
    font-size: 5rem;
}
</style>