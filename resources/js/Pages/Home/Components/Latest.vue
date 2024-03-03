<template>
    <section class="p-5">
        <div class="container text-center">
            <h1 class="mb-4">New Arrivals</h1>
            <div class="row justify-content-between">
                <div class="card col-12 col-md-5 col-lg-3 p-0 m-3 bg-primary text-light border-primary" v-for="car in cars"
                    :key="car.id">
                    <img :src="car.carImage1" class="card-img-top img-fluid" alt="" />
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
                        <div class="d-flex justify-content-center">
                            <Link :href="route('car.show', car.id)" class="btn btn-warning mb-3 img-zoom text-primary">
                            <i class="bi bi-chevron-right"></i> Read More
                            </Link>
                                <button v-if="$page.props.auth" class="btn btn-light border-none ms-2 px-2 py-0 btn-48"
                                    @click="toggleLike(car.id)">
                                    <div class="d-flex align-items-center m-0">
                                        {{ car.likesCount }}
                                        <i class="bi h4 text-danger ms-1 mt-2"
                                        :class="{ 'bi-heart-fill': car.isLikedByUser, 'bi-heart': !car.isLikedByUser }"></i>
                                    </div>
                                </button>
                            <Link v-if="!$page.props.auth" :href="route('login')">
                                <button class="btn btn-light border-none ms-2 px-2 py-2 btn-48">
                                    <div class="d-flex align-items-center m-0">
                                        {{ car.likesCount }}
                                        <i class="bi bi-heart h4 text-danger ms-1 mt-2"></i>
                                    </div>
                                </button>
                            </Link>
                        </div>

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
    },
    data() {
        return {
            isPressed: {}
        }
    },
    methods: {
        toggleLike(carId) {
            this.$inertia.post(`/cars/${carId}/like`, {}, { preserveScroll: true })
        }
    }
};
</script>

<style scoped>
.btn-48{
    height: 48px;
}
</style>
