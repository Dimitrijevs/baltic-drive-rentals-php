<template>
    <section class="p-5">
        <div class="container text-center">
            <h1 class="mb-4">New Arrivals</h1>
            <div class="row justify-content-between">
                <div class="card col-3 p-0 m-3 bg-primary text-light border-primary" v-for="car in cars" :key="car.id">
                    <img
                        :src="car.carImageURL"
                        class="card-img-top img-fluid"
                        alt=""
                    />
                    <div class="card-body">
                        <h3 class="card-title">
                            {{ car.brand }} {{ car.model }}
                        </h3>
                        <p class="text-white mb-0">
                            Price Per Day: {{ car.price_per_day }}€
                        </p>
                        <p class="text-white">
                            Price Per Km: {{ car.price_per_km }}€
                        </p>
                        <Link
                            :href="route('car.show', car.id)"
                            class="btn btn-warning mb-1 img-zoom text-primary"
                        >
                            <i class="bi bi-chevron-right"></i> Read More
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    props: {
        cars: {
            type: Array,
            required: true
        }
    }
};
</script>

<style></style>
