<template>
    <Layout>
        <section class="p-4 bg-primary">
            <div class="container">
                <h1
                    class="text-center mb-4 text-warning"
                    style="margin-top: 60px"
                >
                    {{ car.brand }} {{ car.model }}
                </h1>
                <div class="px-5 mb-2">
                    <div id="main-container" class="container">
                        <div class="d-flex">
                            <div id="statistics" class="me-5">
                                <ul class="list-unstyled">
                                    <li class="bg-light py-2 px-4 d-flex my-2">
                                        <p class="mb-0 me-2 fw-bold">Name:</p>
                                        <span class=""
                                            >{{ car.brand }}
                                            {{ car.model }}</span
                                        >
                                    </li>
                                    <li class="bg-light py-2 px-4 d-flex my-2">
                                        <p class="mb-0 me-2 fw-bold">Year:</p>
                                        <span class="">{{ car.year }}.</span>
                                    </li>
                                    <li class="bg-light py-2 px-4 d-flex my-2">
                                        <p class="mb-0 me-2 fw-bold">
                                            Body Type:
                                        </p>
                                        <span class="">{{
                                            car.body_type
                                        }}</span>
                                    </li>
                                    <li class="bg-light py-2 px-4 d-flex my-2">
                                        <p class="mb-0 me-2 fw-bold">
                                            Gearbox:
                                        </p>
                                        <span class="">{{ car.gearbox }}</span>
                                    </li>
                                    <li class="bg-light py-2 px-4 d-flex my-2">
                                        <p class="mb-0 me-2 fw-bold">
                                            Fuel Type:
                                        </p>
                                        <span class="">{{
                                            car.fuel_type
                                        }}</span>
                                    </li>
                                    <li class="bg-light py-2 px-4 d-flex my-2">
                                        <p class="mb-0 me-2 fw-bold">
                                            Horsepowers:
                                        </p>
                                        <span class=""
                                            >{{ car.horsepower }}Hp</span
                                        >
                                    </li>
                                    <li class="bg-light py-2 px-4 d-flex my-2">
                                        <p class="mb-0 me-2 fw-bold">
                                            CO2 Emissions:
                                        </p>
                                        <span class=""
                                            >{{ car.emissions }}g/km</span
                                        >
                                    </li>
                                    <li class="bg-light py-2 px-4 d-flex my-2">
                                        <p class="mb-0 me-2 fw-bold">
                                            Price Per Day:
                                        </p>
                                        <span class=""
                                            >{{ car.price_per_day }}€</span
                                        >
                                    </li>
                                    <li class="bg-light py-2 px-4 d-flex my-2">
                                        <p class="mb-0 me-2 fw-bold">
                                            Price Per Km:
                                        </p>
                                        <span class=""
                                            >{{ car.price_per_km }}€</span
                                        >
                                    </li>
                                </ul>
                            </div>

                            <div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img
                                            :src="car.carImage1"
                                            class="d-block w-100 rounded"
                                            alt="..."
                                        />
                                    </div>
                                    <div
                                        class="carousel-item"
                                        v-for="(CarImage, index) in carImages"
                                        :key="index"
                                    >
                                        <img
                                            :src="CarImage"
                                            class="d-block w-100 rounded"
                                            alt="..."
                                        />
                                    </div>
                                </div>
                                <button
                                    class="carousel-control-prev"
                                    type="button"
                                    data-bs-target="#carouselExample"
                                    data-bs-slide="prev"
                                >
                                    <span
                                        class="carousel-control-prev-icon"
                                        aria-hidden="true"
                                    ></span>
                                    <span class="visually-hidden"
                                        >Previous</span
                                    >
                                </button>
                                <button
                                    class="carousel-control-next"
                                    type="button"
                                    data-bs-target="#carouselExample"
                                    data-bs-slide="next"
                                >
                                    <span
                                        class="carousel-control-next-icon"
                                        aria-hidden="true"
                                    ></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form @submit.prevent="formSubmit">
                <div class="container mt-5">
                    <div class="row text-center">
                        <div class="col-md-4 mb-3">
                            <label class="text-white mb-2" for="tripDuration"
                                >How long is your trip going to be?</label
                            >
                            <input
                                v-model="form.tripDuration"
                                class="form-control form-control-md input-small mx-auto"
                                type="number"
                                id="tripDuration"
                                placeholder="1-365"
                                min="1"
                                max="365"
                            />
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="text-white mb-2" for="kilometers"
                                >How many kilometers?</label
                            >
                            <input
                                v-model="form.kilometers"
                                class="form-control form-control-md input-small mx-auto"
                                type="number"
                                id="kilometers"
                                placeholder="0-20000 Km"
                                min="0"
                                max="20000"
                            />
                        </div>

                        <div class="col-md-4">
                            <p class="text-white mb-2" for="totalPrice">
                                Total Price:
                            </p>
                            <h4 class="text-warning">{{ totalPrice }}€</h4>
                        </div>
                    </div>
                </div>

                <div class="my-4 text-center img-zoom">
                    <button
                        type="submit"
                        class="btn btn-warning text-primary py-3 px-4"
                    >
                        Rent Your Car!
                    </button>
                </div>
            </form>
        </section>
        <ContactUs />
    </Layout>
</template>

<script>
import Layout from "../../Layout/App.vue";
import ContactUs from "../Home/Components/ContactUs.vue";
import { Link, useForm } from "@inertiajs/vue3";

export default {
    components: {
        Layout,
        ContactUs,
        Link,
    },
    props: {
        car: {
            type: Object,
            required: true,
        },
        carImages: {
            type: Array,
            required: true,
        },
    },
    setup(props) {
        const form = useForm({
            tripDuration: 0,
            kilometers: 0,
        });

        const calculateTotalPrice = () => {
            const pricePerDay = props.car.price_per_day;
            const pricePerKm = props.car.price_per_km;
            const totalDaysPrice = form.tripDuration * pricePerDay;
            const totalKmPrice = form.kilometers * pricePerKm;
            return totalDaysPrice + totalKmPrice;
        };

        const submitForm = () => {
            const formData = {
                tripDuration: form.tripDuration,
                kilometers: form.kilometers,
                totalPrice: totalPrice,
            };

            form.submit('post', route('test'));
        };

        return { form, calculateTotalPrice, submitForm };
    },
    computed: {
        totalPrice() {
            return this.calculateTotalPrice();
        },
    },
};
</script>

<style scoped>
#main-container {
    min-height: 600px;
}

#statistics {
    min-width: 280px;
}

.carousel-inner {
    height: 600px;
}
</style>
