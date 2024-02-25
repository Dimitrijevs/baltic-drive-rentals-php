<template>
    <section class="p-5">
        <div class="container text-center">
            <h1 class="mb-4">New Arrivals</h1>
            <div class="row justify-content-between">
                <div class="card col-12 col-md-5 col-lg-3 p-0 m-3 bg-primary text-light border-primary" v-for="car in cars"
                    :key="car.id">
                    <img :src="car.carImageURL" class="card-img-top img-fluid" alt="" />
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
                        <Link :href="route('car.show', car.id)" class="btn btn-warning mb-1 img-zoom text-primary">
                        <i class="bi bi-chevron-right"></i> Read More
                        </Link>
                        <form @submit.prevent="handleSubmit">
                            <button v-if="$page.props.auth" class="btn btn-light border-none ms-2 py-1 px-2 mb-1"
                                @click="togglePressed(car.id)">
                                <div class="d-flex align-items-center m-0">
                                    {{ car.likes }}
                                    <i class="bi h4 text-danger ms-1 mt-2"
                                        :class="{ 'bi-heart': !isPressed[car.id], 'bi-heart-fill': isPressed[car.id] }"></i>
                                </div>
                            </button>
                        </form>
                        <Link v-if="!$page.props.auth" :href="route('login')">
                        <button class="btn btn-light border-none ms-2 mb-1 px-2">
                            {{ car.likes }}
                            <i class="bi bi-heart h4 text-danger ms-1 mt-2"></i>
                        </button>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { Link, useForm } from "@inertiajs/vue3";
import axios from "axios";

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
    setup(props) {
        const form = useForm({
            carId: props.carId
        });

        const handleSubmit = () => {
            form.submit('post', route('like', props.carId));
        };

        return { form, handleSubmit };
    },
    data() {
        return {
            isPressed: {}
        }
    },
    methods: {
        togglePressed(carId) {
            this.isPressed[carId] = !this.isPressed[carId];
            if (this.isPressed[carId]) {
                this.cars.find(car => car.id === carId).likes++;
                this.sendLike(carId);
            } else {
                this.cars.find(car => car.id === carId).likes--;
                this.sendUnlike(carId);
            }
        },
        sendLike(carId) {
            axios.post('/like', { carId: carId })
                .then(() => {
                    console.log("Like sent successfully");
                })
                .catch((error) => {
                    console.error("Error sending like:", error);
                });
        },
        sendUnlike(carId) {
            axios.post('/unlike', { carId: carId })
                .then(() => {
                    console.log("Unlike sent successfully");
                })
                .catch((error) => {
                    console.error("Error sending unlike:", error);
                });
        }
    }
};
</script>

<style scoped></style>
