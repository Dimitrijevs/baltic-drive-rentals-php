<template>
    <div class="filter rounded bg-light p-4 me-2">
        <div class="filter-box">
            <div class="d-flex align-items-center justify-content-between">
                <h4>Brand</h4>
            </div>
            <div class="one-line">
                <label for="audiCheckbox">
                    <input type="checkbox" id="audiCheckbox" name="brands[]" value="Audi"
                        @change="updateBrandFilter('Audi')">
                    Audi
                </label>
            </div>
            <div class="one-line">
                <label for="bmwCheckbox"><input type="checkbox" id="bmwCheckbox" name="brands[]" value="BMW"
                        @change="updateBrandFilter('BMW')">
                    BMW</label>
            </div>
            <div class="one-line">
                <label for="lexusCheckbox"><input type="checkbox" id="lexusCheckbox" name="brands[]" value="Lexus"
                        @change="updateBrandFilter('Lexus')">
                    Lexus</label>
            </div>
            <div class="one-line">
                <label for="mazdaCheckbox"><input type="checkbox" id="mazdaCheckbox" name="brands[]" value="Mazda"
                        @change="updateBrandFilter('Mazda')">
                    Mazda</label>
            </div>
            <div class="one-line">
                <label for="teslaCheckbox"><input type="checkbox" id="teslaCheckbox" name="brands[]" value="Tesla"
                        @change="updateBrandFilter('Tesla')">
                    Tesla</label>
            </div>
            <div class="one-line">
                <label for="toyotaCheckbox"><input type="checkbox" id="toyotaCheckbox" name="brands[]" value="Toyota"
                        @change="updateBrandFilter('Toyota')">
                    Toyota</label>
            </div>
            <div class="one-line">
                <label for="vwCheckbox"><input type="checkbox" id="vwCheckbox" name="brands[]" value="Volkswagen"
                        @change="updateBrandFilter('Volkswagen')">
                    Volkswagen</label>
            </div>
            <div class="one-line">
                <label for="mercedesCheckbox">
                    <input type="checkbox" id="mercedesCheckbox" name="brands[]" value="Mercedes"
                        @change="updateBrandFilter('Mercedes')">
                    Mercedes
                </label>
            </div>
            <div class="one-line">
                <label for="opelCheckbox">
                    <input type="checkbox" id="opelCheckbox" name="brands[]" value="Opel"
                        @change="updateBrandFilter('Opel')">
                    Opel
                </label>
            </div>
            <hr>
        </div>

        <div class="filter-box">
            <h4>Body Type</h4>
            <div class="one-line">
                <label for="cabrioletCheckbox"><input type="checkbox" id="cabrioletCheckbox" name="body_types[]"
                        value="Cabriolet" @change="updateBodyTypeFilter('Cabriolet')"> Cabriolet</label>
            </div>
            <div class="one-line">
                <label for="estateCheckbox"><input type="checkbox" id="estateCheckbox" name="body_types[]"
                        value="Estate" @change="updateBodyTypeFilter('Estate')"> Estate</label>
            </div>
            <div class="one-line">
                <label for="hatchbackCheckbox">
                    <input type="checkbox" id="hatchbackCheckbox" name="body_types[]" value="Hatchback"
                        @change="updateBodyTypeFilter('Hatchback')">
                    Hatchback
                </label>
            </div>
            <div class="one-line">
                <label for="sedanCheckbox">
                    <input type="checkbox" id="sedanCheckbox" name="body_types[]" value="Sedan"
                        @change="updateBodyTypeFilter('Sedan')">
                    Sedan
                </label>
            </div>
            <div class="one-line">
                <label for="suvCheckbox">
                    <input type="checkbox" id="suvCheckbox" name="body_types[]" value="Crossover"
                        @change="updateBodyTypeFilter('Crossover')">
                    Crossover
                </label>
            </div>
            <hr>
        </div>

        <div class="filter-box">
            <h4>Fuel Type</h4>
            <div class="one-line">
                <label for="dieselCheckbox"><input type="checkbox" id="dieselCheckbox"
                        @change="updateFuelTypeFilter('Diesel')"> Diesel</label>
            </div>
            <div class="one-line">
                <label for="electricCheckbox"><input type="checkbox" id="electricCheckbox"
                        @change="updateFuelTypeFilter('Electric')">
                    Electric</label>
            </div>
            <div class="one-line">
                <label for="hybridCheckbox"><input type="checkbox" id="hybridCheckbox"
                        @change="updateFuelTypeFilter('Hybrid')"> Hybrid</label>
            </div>
            <div class="one-line">
                <label for="petrolCheckbox"><input type="checkbox" id="petrolCheckbox"
                        @change="updateFuelTypeFilter('Petrol')"> Petrol</label>
            </div>
            <hr>
        </div>

        <div class="filter-box">
            <h4>Gearbox</h4>
            <div class="one-line">
                <label for="automaticCheckbox"><input type="checkbox" id="automaticCheckbox"
                        @change="setGearboxFilter('Automatic')">
                    Automatic</label>
            </div>
            <div class="one-line">
                <label for="manualCheckbox"><input type="checkbox" id="manualCheckbox"
                        @change="setGearboxFilter('Manual')"> Manual</label>
            </div>
            <hr>
        </div>

        <div class="filter-box one-select">
            <h4>Emmissions</h4>
            <div class="one-line">
                <label for="upTo50"><input type="radio" name="emissions" @change="setEmissionsilter('50')">
                    Up to
                    50g/km</label>
            </div>
            <div class="one-line">
                <label for="upTo100"><input type="radio" name="emissions" @change="setEmissionsilter('100')">
                    Up to
                    100g/km</label>
            </div>
            <div class="one-line">
                <label for="upTo150"><input type="radio" name="emissions" @change="setEmissionsilter('150')">
                    Up to
                    150g/km</label>
            </div>
            <div class="one-line">
                <label for="upTo200"><input type="radio" name="emissions" @change="setEmissionsilter('200')">
                    Up to
                    200g/km</label>
            </div>
        </div>
        <hr>

        <div class="filter-box one-select">
            <h4>Price per day</h4>
            <div class="one-line">
                <label for="upTo20Checkbox"><input type="radio" name="priceRange" @change="setPriceFilter('20')">
                    Up to
                    20€</label>
            </div>
            <div class="one-line">
                <label for="upTo40Checkbox"><input type="radio" name="priceRange" @change="setPriceFilter('40')">
                    Up to
                    40€</label>
            </div>
            <div class="one-line">
                <label for="upTo60Checkbox"><input type="radio" name="priceRange" @change="setPriceFilter('60')">
                    Up to
                    60€</label>
            </div>
            <div class="one-line">
                <label for="upTo80Checkbox"><input type="radio" name="priceRange" @change="setPriceFilter('80')">
                    Up to
                    80€</label>
            </div>
            <div class="one-line">
                <label for="upTo100Checkbox"><input type="radio" name="priceRange" @change="setPriceFilter('100')">
                    Up to
                    100€</label>
            </div>
        </div>
        <hr>

        <div class="filter-box one-select">
            <h4>Price per km</h4>
            <div class="one-line">
                <label for="upTo20Checkbox"><input type="radio" name="priceRangePerKm"
                        @change="setPricePerKmFilter('0.2')">
                    Up to
                    0.2€</label>
            </div>
            <div class="one-line">
                <label for="upTo30Checkbox"><input type="radio" name="priceRangePerKm"
                        @change="setPricePerKmFilter('0.4')">
                    Up to
                    0.4€</label>
            </div>
            <div class="one-line">
                <label for="upTo50Checkbox"><input type="radio" name="priceRangePerKm"
                        @change="setPricePerKmFilter('0.6')">
                    Up to
                    0.6€</label>
            </div>
            <div class="one-line">
                <label for="upTo70Checkbox"><input type="radio" name="priceRangePerKm"
                        @change="setPricePerKmFilter('0.8')">
                    Up to
                    0.8€</label>
            </div>
            <div class="one-line">
                <label for="upTo100Checkbox"><input type="radio" name="priceRangePerKm"
                        @change="setPricePerKmFilter('1')">
                    Up to
                    1€</label>
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
