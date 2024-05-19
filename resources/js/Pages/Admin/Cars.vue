<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <SideBar />
                </div>
                <div class="overflow-auto col-md-9">
                    <ul>
                        <li v-for="car in cars.data" :key="car.id">
                            {{ car.brand }} {{ car.model }} {{ car.year }}
                        </li>
                    </ul>
                    <Pagination :links="cars.links" />
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