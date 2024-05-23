<template>
    <div class="filter rounded bg-light p-4 me-2">
        <div class="filter-box">
            <div class="d-flex align-items-center justify-content-between">
                <h4>Brand</h4>
            </div>
            <div class="one-line">
                <label for="audiCheckbox">
                    <input type="checkbox" id="audiCheckbox" name="brands[]" value="Audi"
                        @change="updateBrandFilter('Audi')" aria-label="Filter by Audi">
                    Audi
                </label>
            </div>
            <div class="one-line">
                <label for="bmwCheckbox">
                    <input type="checkbox" id="bmwCheckbox" name="brands[]" value="BMW"
                        @change="updateBrandFilter('BMW')" aria-label="Filter by BMW">
                    BMW
                </label>
            </div>
            <div class="one-line">
                <label for="lexusCheckbox">
                    <input type="checkbox" id="lexusCheckbox" name="brands[]" value="Lexus"
                        @change="updateBrandFilter('Lexus')" aria-label="Filter by Lexus">
                    Lexus
                </label>
            </div>
            <div class="one-line">
                <label for="mazdaCheckbox">
                    <input type="checkbox" id="mazdaCheckbox" name="brands[]" value="Mazda"
                        @change="updateBrandFilter('Mazda')" aria-label="Filter by Mazda">
                    Mazda
                </label>
            </div>
            <div class="one-line">
                <label for="teslaCheckbox">
                    <input type="checkbox" id="teslaCheckbox" name="brands[]" value="Tesla"
                        @change="updateBrandFilter('Tesla')" aria-label="Filter by Tesla">
                    Tesla
                </label>
            </div>
            <div class="one-line">
                <label for="toyotaCheckbox">
                    <input type="checkbox" id="toyotaCheckbox" name="brands[]" value="Toyota"
                        @change="updateBrandFilter('Toyota')" aria-label="Filter by Toyota">
                    Toyota
                </label>
            </div>
            <div class="one-line">
                <label for="vwCheckbox">
                    <input type="checkbox" id="vwCheckbox" name="brands[]" value="Volkswagen"
                        @change="updateBrandFilter('Volkswagen')" aria-label="Filter by Volkswagen">
                    Volkswagen
                </label>
            </div>
            <div class="one-line">
                <label for="mercedesCheckbox">
                    <input type="checkbox" id="mercedesCheckbox" name="brands[]" value="Mercedes"
                        @change="updateBrandFilter('Mercedes')" aria-label="Filter by Mercedes">
                    Mercedes
                </label>
            </div>
            <div class="one-line">
                <label for="opelCheckbox">
                    <input type="checkbox" id="opelCheckbox" name="brands[]" value="Opel"
                        @change="updateBrandFilter('Opel')" aria-label="Filter by Opel">
                    Opel
                </label>
            </div>
            <hr>
        </div>

        <div class="filter-box">
            <h4>Body Type</h4>
            <div class="one-line">
                <label for="cabrioletCheckbox">
                    <input type="checkbox" id="cabrioletCheckbox" name="body_types[]" value="Cabriolet"
                        @change="updateBodyTypeFilter('Cabriolet')" aria-label="Filter by Cabriolet body type">
                    Cabriolet
                </label>
            </div>
            <div class="one-line">
                <label for="estateCheckbox">
                    <input type="checkbox" id="estateCheckbox" name="body_types[]" value="Estate"
                        @change="updateBodyTypeFilter('Estate')" aria-label="Filter by Estate body type">
                    Estate
                </label>
            </div>
            <div class="one-line">
                <label for="hatchbackCheckbox">
                    <input type="checkbox" id="hatchbackCheckbox" name="body_types[]" value="Hatchback"
                        @change="updateBodyTypeFilter('Hatchback')" aria-label="Filter by Hatchback body type">
                    Hatchback
                </label>
            </div>
            <div class="one-line">
                <label for="sedanCheckbox">
                    <input type="checkbox" id="sedanCheckbox" name="body_types[]" value="Sedan"
                        @change="updateBodyTypeFilter('Sedan')" aria-label="Filter by Sedan body type">
                    Sedan
                </label>
            </div>
            <div class="one-line">
                <label for="suvCheckbox">
                    <input type="checkbox" id="suvCheckbox" name="body_types[]" value="Crossover"
                        @change="updateBodyTypeFilter('Crossover')" aria-label="Filter by Crossover body type">
                    Crossover
                </label>
            </div>
            <hr>
        </div>

        <div class="filter-box">
            <h4>Fuel Type</h4>
            <div class="one-line">
                <label for="dieselCheckbox">
                    <input type="checkbox" id="dieselCheckbox" @change="updateFuelTypeFilter('Diesel')"
                        aria-label="Filter by Diesel fuel type">
                    Diesel
                </label>
            </div>
            <div class="one-line">
                <label for="electricCheckbox">
                    <input type="checkbox" id="electricCheckbox" @change="updateFuelTypeFilter('Electric')"
                        aria-label="Filter by Electric fuel type">
                    Electric
                </label>
            </div>
            <div class="one-line">
                <label for="hybridCheckbox">
                    <input type="checkbox" id="hybridCheckbox" @change="updateFuelTypeFilter('Hybrid')"
                        aria-label="Filter by Hybrid fuel type">
                    Hybrid
                </label>
            </div>
            <div class="one-line">
                <label for="petrolCheckbox">
                    <input type="checkbox" id="petrolCheckbox" @change="updateFuelTypeFilter('Petrol')"
                        aria-label="Filter by Petrol fuel type">
                    Petrol
                </label>
            </div>
            <hr>
        </div>

        <div class="filter-box">
            <h4>Gearbox</h4>
            <div class="one-line">
                <label for="automaticCheckbox">
                    <input type="checkbox" id="automaticCheckbox" @change="setGearboxFilter('Automatic')"
                        aria-label="Filter by Automatic gearbox">
                    Automatic
                </label>
            </div>
            <div class="one-line">
                <label for="manualCheckbox">
                    <input type="checkbox" id="manualCheckbox" @change="setGearboxFilter('Manual')"
                        aria-label="Filter by Manual gearbox">
                    Manual
                </label>
            </div>
            <hr>
        </div>

        <div class="filter-box one-select">
            <h4>Emmissions</h4>
            <div class="one-line">
                <label for="upTo50">
                    <input type="radio" name="emissions" @change="setEmissionsilter('50')"
                        aria-label="Filter by emissions up to 50g/km">
                    Up to 50g/km
                </label>
            </div>
            <div class="one-line">
                <label for="upTo100">
                    <input type="radio" name="emissions" @change="setEmissionsilter('100')"
                        aria-label="Filter by emissions up to 100g/km">
                    Up to 100g/km
                </label>
            </div>
            <div class="one-line">
                <label for="upTo150">
                    <input type="radio" name="emissions" @change="setEmissionsilter('150')"
                        aria-label="Filter by emissions up to 150g/km">
                    Up to 150g/km
                </label>
            </div>
            <div class="one-line">
                <label for="upTo200">
                    <input type="radio" name="emissions" @change="setEmissionsilter('200')"
                        aria-label="Filter by emissions up to 200g/km">
                    Up to 200g/km
                </label>
            </div>
        </div>
        <hr>

        <div class="filter-box one-select">
            <h4>Price per day</h4>
            <div class="one-line">
                <label for="upTo20Checkbox">
                    <input type="radio" name="priceRange" @change="setPriceFilter('20')"
                        aria-label="Filter by price up to 20€ per day">
                    Up to 20€
                </label>
            </div>
            <div class="one-line">
                <label for="upTo40Checkbox">
                    <input type="radio" name="priceRange" @change="setPriceFilter('40')"
                        aria-label="Filter by price up to 40€ per day">
                    Up to 40€
                </label>
            </div>
            <div class="one-line">
                <label for="upTo60Checkbox">
                    <input type="radio" name="priceRange" @change="setPriceFilter('60')"
                        aria-label="Filter by price up to 60€ per day">
                    Up to 60€
                </label>
            </div>
            <div class="one-line">
                <label for="upTo80Checkbox">
                    <input type="radio" name="priceRange" @change="setPriceFilter('80')"
                        aria-label="Filter by price up to 80€ per day">
                    Up to 80€
                </label>
            </div>
            <div class="one-line">
                <label for="upTo100Checkbox">
                    <input type="radio" name="priceRange" @change="setPriceFilter('100')"
                        aria-label="Filter by price up to 100€ per day">
                    Up to 100€
                </label>
            </div>
        </div>
        <hr>

        <div class="filter-box one-select">
            <h4>Price per km</h4>
            <div class="one-line">
                <label for="upTo20Checkbox">
                    <input type="radio" name="priceRangePerKm" @change="setPricePerKmFilter('0.2')"
                        aria-label="Filter by price up to 0.2€ per km">
                    Up to 0.2€
                </label>
            </div>
            <div class="one-line">
                <label for="upTo30Checkbox">
                    <input type="radio" name="priceRangePerKm" @change="setPricePerKmFilter('0.4')"
                        aria-label="Filter by price up to 0.4€ per km">
                    Up to 0.4€
                </label>
            </div>
            <div class="one-line">
                <label for="upTo50Checkbox">
                    <input type="radio" name="priceRangePerKm" @change="setPricePerKmFilter('0.6')"
                        aria-label="Filter by price up to 0.6€ per km">
                    Up to 0.6€
                </label>
            </div>
            <div class="one-line">
                <label for="upTo70Checkbox">
                    <input type="radio" name="priceRangePerKm" @change="setPricePerKmFilter('0.8')"
                        aria-label="Filter by price up to 0.8€ per km">
                    Up to 0.8€
                </label>
            </div>
            <div class="one-line">
                <label for="upTo100Checkbox">
                    <input type="radio" name="priceRangePerKm" @change="setPricePerKmFilter('1')"
                        aria-label="Filter by price up to 1€ per km">
                    Up to 1€
                </label>
            </div>
        </div>
    </div>
</template>

<script setup>

const emit = defineEmits(['setPricePerKmFilter', 'setPriceFilter', 'setGearboxFilter', 'updateFuelTypeFilter',
    'updateBodyTypeFilter', 'updateBrandFilter', 'setEmissionsilter'])

const setPricePerKmFilter = (value) => {
    emit('setPricePerKmFilter', value)
}

const setPriceFilter = (value) => {
    emit('setPriceFilter', value)
}

const setGearboxFilter = (value) => {
    emit('setGearboxFilter', value)
}

const updateFuelTypeFilter = (value) => {
    emit('updateFuelTypeFilter', value)
}

const setEmissionsilter = (value) => {
    emit('setEmissionsilter', value)
}

const updateBodyTypeFilter = (value) => {
    emit('updateBodyTypeFilter', value)
}

const updateBrandFilter = (value) => {
    emit('updateBrandFilter', value)
}

</script>

<style scoped></style>
