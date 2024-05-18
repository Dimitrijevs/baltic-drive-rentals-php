<template>
    <button type="button" class="btn btn-warning text-primary d-block py-2" style="width: 216px;" data-bs-toggle="modal"
        data-bs-target="#staticBackdrop">
        <i class="bi bi-heart-fill me-2"></i> Liked Cars
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header justify-content-around">
                    <h5 class="modal-title" id="staticBackdropLabel">Liked cars</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-around">
                        <div class="card col-12 col-md-5 col-lg-3 p-0 m-3 bg-primary text-light border-primary"
                            v-for="car in likedCars" :key="car.id">
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
                                <!-- Button group -->
                                <div class="d-flex justify-content-center">
                                    <button @click="openCarDetails(car.id)"
                                        class="btn btn-warning mb-3 img-zoom text-primary">
                                        <i class="bi bi-chevron-right"></i> Read More
                                    </button>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary p-0" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    props: {
        likedCars: {
            type: Array,
            required: true,
        },
    },
    methods: {
        toggleLike(carId) {
            this.$inertia.post(`/cars/${carId}/like`, {}, { preserveScroll: true });
        },
        openCarDetails(carId) {
            let modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
            modal.hide();
            this.$inertia.visit(`/cars/${carId}`);
        }
    },
};
</script>

<style scoped>
.btn-48 {
    height: 48px;
}
</style>
