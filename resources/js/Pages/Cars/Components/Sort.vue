<template>
    <div class="dropdown filter rounded bg-light p-4 me-2">
        <h4 class="text-center">Sorting</h4>
        <button class="btn btn-secondary dropdown-toggle" type="button" id="sortingDropdown" aria-haspopup="true"
            aria-expanded="false" aria-controls="sortingOptions">
            Please select an option
        </button>
        <ul class="dropdown-menu" id="sortingOptions" aria-labelledby="sortingDropdown">
            <li class="dropdown-item" @click="sort('cheapToExpensiveDay')">Sort from cheapest to most expensive (price
                per day)</li>
            <li class="dropdown-item" @click="sort('expensiveToCheapDay')">Sort from most expensive to cheapest (price
                per day)</li>
            <li class="dropdown-item" @click="sort('cheapToExpensiveKM')">Sort from cheapest to most expensive (price
                per km)</li>
            <li class="dropdown-item" @click="sort('expensiveToCheapKM')">Sort from most expensive to cheapest (price
                per km)</li>
            <li class="dropdown-item" @click="sort('mostPopular')">Sort by most popular choices</li>
            <li class="dropdown-item" @click="sort('leastPopular')">Sort by least popular choices</li>
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
