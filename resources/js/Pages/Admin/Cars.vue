<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <SideBar />
                </div>
                <div class="overflow-auto col-md-9 mt-3">
                    <div class="d-flex justify-content-between">
                        <h3>Cars list</h3>
                        <Link :href="route('cars.create')" class="btn btn-warning rounded">Add new car</Link>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>HP</th>
                                <th>Bodywork</th>
                                <th>Fuel</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="cars.data.length === 0">
                                <td colspan="3">No cars found.</td>
                            </tr>
                            <tr v-for="(car, index) in cars.data" :key="car.id">
                                <td>{{ index + 1 }}.</td>
                                <td>
                                    {{ car.brand }}
                                </td>
                                <td>
                                    {{ car.model }}
                                </td>
                                <td>
                                    {{ car.year }}
                                </td>
                                <td>
                                    {{ car.horsepower }}
                                </td>
                                <td>
                                    {{ car.body_type }}
                                </td>
                                <td>
                                    {{ car.fuel_type }}
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-warning me-1">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination :links="cars.links" class="d-flex justify-content-end"/>
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