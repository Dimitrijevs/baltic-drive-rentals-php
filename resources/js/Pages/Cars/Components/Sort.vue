<template>
    <div class="dropdown filter rounded bg-light p-4 me-2" aria-labelledby="sortingDropdown">
        <h4 class="text-center">Sorting</h4>
        <button class="btn btn-secondary dropdown-toggle" type="button" id="sortingDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Please select an option
        </button>
        <ul class="dropdown-menu" id="sortingOptions" aria-labelledby="sortingDropdown">
            <li class="dropdown-item" @click="sort('cheapToExpensiveDay')" aria-label="Sort from cheapest to most expensive per day">From cheapest to most expensive (day)</li>
            <li class="dropdown-item" @click="sort('expensiveToCheapDay')" aria-label="Sort from most expensive to cheapest per day">From most expensive to cheapest (day)</li>
            <li class="dropdown-item" @click="sort('cheapToExpensiveKM')" aria-label="Sort from cheapest to most expensive per kilometer">From cheapest to most expensive (km)</li>
            <li class="dropdown-item" @click="sort('expensiveToCheapKM')" aria-label="Sort from most expensive to cheapest per kilometer">From most expensive to cheapest (km)</li>
            <li class="dropdown-item" @click="sort('mostPopular')" aria-label="Sort by most popular">Most popular</li>
            <li class="dropdown-item" @click="sort('leastPopular')" aria-label="Sort by least popular">Least popular</li>
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
