<template>
    <div class="dropdown filter rounded bg-light p-4 me-2">
        <h4 class="text-center">Sorting</h4>
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Please select an option
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li class="dropdown-item" @click="sort('cheapToExpensiveDay')">From cheapest to most expensive (price per day)</li>
            <li class="dropdown-item" @click="sort('expensiveToCheapDay')">From most expensive to cheapest (price per day)</li>
            <li class="dropdown-item" @click="sort('cheapToExpensiveKM')">From cheapest to most expensive (price per km)</li>
            <li class="dropdown-item" @click="sort('expensiveToCheapKM')">From most expensive to cheapest (price per km)</li>
            <li class="dropdown-item" @click="sort('mostPopular')">Most popular choices</li>
            <li class="dropdown-item" @click="sort('leastPopular')">Least popular choices</li>
        </ul>
    </div>
</template>

<script setup>
const emit = defineEmits(['sort']);

const sort = (value) => {
    emit('sort', value)
}
</script>

<style scoped></style>
