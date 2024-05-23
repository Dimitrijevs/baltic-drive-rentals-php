<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <SideBar aria-label="sidebar navigation" />
                </div>
                <div class="overflow-auto col-md-9 mt-3">
                    <div class="d-flex justify-content-between" aria-label="cars list header">
                        <h3>Cars list</h3>
                        <Link :href="route('cars.create')" class="btn btn-warning rounded" aria-label="add new car">Add
                        new car</Link>
                    </div>
                    <table class="table" aria-label="cars list table">
                        <thead>
                            <tr>
                                <th aria-label="number column">No.</th>
                                <th aria-label="brand column">Brand</th>
                                <th aria-label="model column">Model</th>
                                <th aria-label="year column">Year</th>
                                <th aria-label="horsepower column">HP</th>
                                <th aria-label="bodywork column">Bodywork</th>
                                <th aria-label="fuel column">Fuel</th>
                                <th class="text-end" aria-label="actions column">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="cars.data.length === 0">
                                <td colspan="8" aria-label="no cars found">No cars found.</td>
                            </tr>
                            <tr v-for="(car, index) in cars.data" :key="car.id">
                                <td aria-label="car number">{{ index + 1 }}.</td>
                                <td aria-label="car brand">{{ car.brand }}</td>
                                <td aria-label="car model">{{ car.model }}</td>
                                <td aria-label="car year">{{ car.year }}</td>
                                <td aria-label="car horsepower">{{ car.horsepower }}</td>
                                <td aria-label="car body type">{{ car.body_type }}</td>
                                <td aria-label="car fuel type">{{ car.fuel_type }}</td>
                                <td class="text-end" aria-label="car actions">
                                    <button class="btn btn-sm btn-warning me-1" aria-label="edit car">Edit</button>
                                    <button class="btn btn-sm btn-danger" aria-label="delete car">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination :links="cars.links" class="d-flex justify-content-end"
                        aria-label="pagination for cars list" />
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "../../Layout/App.vue";
import { Link } from "@inertiajs/vue3";
import SideBar from "./Partials/SideBar.vue";
import Pagination from "./Partials/Pagination.vue";

export default {
    components: {
        Layout,
        Link,
        SideBar,
        Pagination,
    },
    props: {
        cars: {
            type: Array,
            required: true,
        },
    },
};

</script>

<style></style>