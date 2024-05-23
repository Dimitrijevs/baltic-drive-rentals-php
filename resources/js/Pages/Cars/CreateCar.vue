<template>
    <Layout>
        <div id="main-container" class="row justify-content-center text-center mx-auto">
            <div class="col-12 col-sm-8 col-md-6 margin-100">
                <form enctype="multipart/form-data" @submit.prevent="handleSubmit">
                    <h1>Add New Car</h1>
                    <div class="form-group mt-3" aria-labelledby="brandLabel">
                        <label for="brand" class="text-dark" id="brandLabel">Brand Name:</label><br>
                        <input v-model="form.brand" type="text" name="brand" id="brand"
                            class="form-control border-primary">
                        <div v-if="errors.brand" class="d-block mt-2" role="alert">
                            <span class="fs-5 text-danger">
                                {{ errors.brand }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3" aria-labelledby="modelLabel">
                        <label for="model" class="text-dark" id="modelLabel">Model Name:</label><br>
                        <input v-model="form.model" type="text" name="model" id="model"
                            class="form-control border-primary">
                        <div v-if="errors.model" class="d-block mt-2" role="alert">
                            <span class="fs-5 text-danger">
                                {{ errors.model }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3" aria-labelledby="yearLabel">
                        <label for="year" class="text-dark" id="yearLabel">Year:</label><br>
                        <input v-model="form.year" type="number" name="year" id="year" class="form-control">
                        <div v-if="errors.year" class="d-block mt-2" role="alert">
                            <span class="fs-5 text-danger">
                                {{ errors.year }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3" aria-labelledby="horsepowerLabel">
                        <label for="horsepower" class="text-dark" id="horsepowerLabel">Horsepowers:</label><br>
                        <input v-model="form.horsepower" type="number" name="horsepower" id="horsepower"
                            class="form-control">
                        <div v-if="errors.horsepower" class="d-block mt-2" role="alert">
                            <span class="fs-5 text-danger">
                                {{ errors.horsepower }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3" aria-labelledby="bodyTypeLabel">
                        <label for="body_type" class="text-dark" id="bodyTypeLabel">Body Type:</label><br>
                        <input v-model="form.body_type" type="text" name="body_type" id="body_type"
                            class="form-control border-primary">
                        <div v-if="errors.body_type" class="d-block mt-2" role="alert">
                            <span class="fs-5 text-danger">
                                {{ errors.body_type }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3" aria-labelledby="fuelTypeLabel">
                        <label for="fuel_type" class="text-dark" id="fuelTypeLabel">Fuel Type:</label><br>
                        <input v-model="form.fuel_type" type="text" name="fuel_type" id="fuel_type"
                            class="form-control border-primary">
                        <div v-if="errors.fuel_type" class="d-block mt-2" role="alert">
                            <span class="fs-5 text-danger">
                                {{ errors.fuel_type }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3" aria-labelledby="emissionsLabel">
                        <label for="emissions" class="text-dark" id="emissionsLabel">CO2 Emissions:</label><br>
                        <input v-model="form.emissions" type="number" name="emissions" id="emissions"
                            class="form-control border-primary">
                        <div v-if="errors.emissions" class="d-block mt-2" role="alert">
                            <span class="fs-5 text-danger">
                                {{ errors.emissions }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3" aria-labelledby="gearboxLabel">
                        <label for="gearbox" class="text-dark" id="gearboxLabel">Gearbox:</label><br>
                        <input v-model="form.gearbox" type="text" name="gearbox" id="gearbox"
                            class="form-control border-primary">
                        <div v-if="errors.gearbox" class="d-block mt-2" role="alert">
                            <span class="fs-5 text-danger">
                                {{ errors.gearbox }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3" aria-labelledby="pricePerDayLabel">
                        <label for="price_per_day" class="text-dark" id="pricePerDayLabel">Price per day:</label><br>
                        <input v-model="form.price_per_day" type="number" name="price_per_day" id="price_per_day"
                            class="form-control border-primary">
                        <div v-if="errors.price_per_day" class="d-block mt-2" role="alert">
                            <span class="fs-5 text-danger">
                                {{ errors.price_per_day }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3" aria-labelledby="pricePerKmLabel">
                        <label for="price_per_km" class="text-dark" id="pricePerKmLabel">Price per Km:</label><br>
                        <input v-model="form.price_per_km" type="number" step="0.01" name="price_per_km"
                            id="price_per_km" class="form-control border-primary">
                        <div v-if="errors.price_per_km" class="d-block mt-2" role="alert">
                            <span class="fs-5 text-danger">
                                {{ errors.price_per_km }}
                            </span>
                        </div>
                    </div>
                    <div id="photoInputsContainer" aria-labelledby="carImageLabel">
                        <div class="form-group mt-3">
                            <label for="carImage1" class="text-dark" id="carImageLabel">Add 1. Car Image:</label><br>
                            <input @input="form.carImage1 = $event.target.files[0]" type="file" name="carImage1"
                                class="carImage form-control border-primary" aria-describedby="carImageError">
                            <div v-if="errors.carImage1" class="d-block mt-2" id="carImageError" role="alert">
                                <span class="fs-5 text-danger">
                                    {{ errors.carImage1 }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary mt-3" @click="addFileInput"
                        aria-label="Add Another Image Input">Add another Image</button>

                    <div class="d-flex justify-content-end align-items-center my-3">
                        <div class="form-group ms-3">
                            <button type="submit" class="btn btn-warning text-primary py-2 px-3"
                                aria-label="Submit Form">Add New Car!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "../../Layout/App.vue";
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    errors: Object,
});

const form = useForm({
    brand: "",
    model: "",
    year: null,
    horsepower: null,
    body_type: "",
    fuel_type: "",
    emissions: null,
    gearbox: "",
    price_per_day: null,
    price_per_km: null,
    carImage1: null,
    carImage2: null,
    carImage3: null,
    carImage4: null,
    carImage5: null,
    carImage6: null,
    carImage7: null,
    carImage8: null,
});

const addFileInput = () => {
    // amounth of images
    const carImageCount = document.querySelectorAll('.carImage').length;

    // if there are already 8 images, don't add another one
    if (carImageCount >= 8) {
        alert('You can only add up to 8 images.');
        return;
    }

    // get the next image number
    let nextImageNumber = carImageCount + 1;

    // Create input element
    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.name = `carImage${nextImageNumber}`;
    fileInput.className = 'carImage form-control border-primary';
    fileInput.addEventListener('input', (event) => {
        // Update the corresponding form variable with the selected file
        form[`carImage${nextImageNumber}`] = event.target.files[0];
    });

    // Create label element
    const label = document.createElement('label');
    label.textContent = `Add ${nextImageNumber}. Car Image:`;

    // Create div element and append label and input
    const div = document.createElement('div');
    div.className = 'form-group mt-3';
    div.appendChild(label);
    div.appendChild(fileInput);

    // Append the new input element to the photoInputsContainer
    const photoInputsContainer = document.getElementById('photoInputsContainer');
    photoInputsContainer.appendChild(div);
}

const handleSubmit = () => {
    form.post(route('cars.create'), {
        carImage1: form.carImage1,
        carImage2: form.carImage2,
        carImage3: form.carImage3,
        carImage4: form.carImage4,
        carImage5: form.carImage5,
        carImage6: form.carImage6,
        carImage7: form.carImage7,
        carImage8: form.carImage8,
    });
}
</script>


<style scoped>
#main-container {
    margin-top: 100px;
    margin-bottom: 120px;
}
</style>
