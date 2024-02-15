<template>
    <Layout>
        <div id="main-container" class="row justify-content-center text-center mx-auto">
            <div class="col-12 col-sm-8 col-md-6 margin-100">
                <form enctype="multipart/form-data" @submit.prevent="handleSubmit">
                    <h1>Add New Car</h1>
                    <div class="form-group mt-3">
                        <label for="brand" class="text-dark">Brand Name:</label><br>
                        <input type="text" name="brand" id="brand" class="form-control border-primary">
                        <div v-if="errors.title" class="d-block mt-2">
                            <span class="fs-5 text-danger">
                                {{ errors.title }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="model" class="text-dark">Model Name:</label><br>
                        <input type="text" name="model" id="model" class="form-control border-primary">
                        <div v-if="errors.title" class="d-block mt-2">
                            <span class="fs-5 text-danger">
                                {{ errors.title }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="year" class="text-dark">Year:</label><br>
                        <input type="number" name="year" id="year" class="form-control">
                        <div v-if="errors.title" class="d-block mt-2">
                            <span class="fs-5 text-danger">
                                {{ errors.title }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="horsepower" class="text-dark">Horsepowers:</label><br>
                        <input type="number" name="horsepower" id="horsepower" class="form-control">
                        <div v-if="errors.title" class="d-block mt-2">
                            <span class="fs-5 text-danger">
                                {{ errors.title }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="body_type" class="text-dark">Body Type:</label><br>
                        <input type="text" name="body_type" id="body_type" class="form-control border-primary">
                        <div v-if="errors.title" class="d-block mt-2">
                            <span class="fs-5 text-danger">
                                {{ errors.title }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="fuel_type" class="text-dark">Fuel Type:</label><br>
                        <input type="text" name="fuel_type" id="fuel_type" class="form-control border-primary">
                        <div v-if="errors.title" class="d-block mt-2">
                            <span class="fs-5 text-danger">
                                {{ errors.title }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="emissions" class="text-dark">CO2 Emissions:</label><br>
                        <input type="number" name="emissions" id="emissions" class="form-control border-primary">
                        <div v-if="errors.title" class="d-block mt-2">
                            <span class="fs-5 text-danger">
                                {{ errors.title }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="gearbox" class="text-dark">Gearbox:</label><br>
                        <input type="text" name="gearbox" id="gearbox" class="form-control border-primary">
                        <div v-if="errors.title" class="d-block mt-2">
                            <span class="fs-5 text-danger">
                                {{ errors.title }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="price_per_day" class="text-dark">Price per day:</label><br>
                        <input type="number" name="price_per_day" id="price_per_day" class="form-control border-primary">
                        <div v-if="errors.title" class="d-block mt-2">
                            <span class="fs-5 text-danger">
                                {{ errors.title }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="price_per_km" class="text-dark">Price per Km:</label><br>
                        <input type="number" step="0.01" name="price_per_km" id="price_per_km" class="form-control border-primary">
                        <div v-if="errors.title" class="d-block mt-2">
                            <span class="fs-5 text-danger">
                                {{ errors.title }}
                            </span>
                        </div>
                    </div>
                    <div id="photoInputsContainer">
                        <div class="form-group mt-3">
                            <label for="carImage1" class="text-dark">Add 1. Car Photo:</label><br>
                            <input type="file" name="carImage1" class="carImage form-control border-primary">
                            <div v-if="errors.title" class="d-block mt-2">
                                <span class="fs-5 text-danger">
                                    {{ errors.title }}
                                </span>
                            </div>
                        </div>
                    </div>
    
                    <button type="button" class="btn btn-warning text-primary py-2 px-3 mt-2" onclick="addFileInput()">Add More
                        Photos</button>
    
                    <div class="d-flex justify-content-end align-items-center my-3">
                        <div class="form-group ms-3">
                            <button type="submit" class="btn btn-warning text-primary py-2 px-3">Add New Car!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "../../Layout/App.vue";
import { useForm } from "@inertiajs/vue3";

export default {
    componenents: {
        Layout,
    },
    props: {
        errors: Object,
    },
    setup(props) {
        const form = useForm({
            brand: "",
            model: "",
            year: 0,
            horsepower: 0,
            body_type: "",
            brfuel_type: "",
            emissions: 0,
            gearbox: "",
            price_per_day: 0,
            price_per_km: 0,
            carImage1: "",
            carImage2: "",
            carImage3: "",
            carImage4: "",
            carImage5: "",
            carImage6: "",
            carImage7: "",
            carImage8: "",
        });

        const handleSubmit = () => {
            form.post(route('cars.create'));
        };

        return { form, handleSubmit };
    },
}
</script>

<style scoped>
    #main-container {
        margin-top: 100px;
        margin-bottom: 120px;
    }

</style>