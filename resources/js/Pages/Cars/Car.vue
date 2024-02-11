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

            <form @submit.prevent="submitForm" class="mt-5">
                <h1 class="text-warning text-center mb-0">Rent a car</h1>
                <div class="container mt-5">
                    <div class="text-center">
                        <div class="d-flex justify-content-around">
                            <div class="mb-3">
                                <label class="text-white mb-2" for="startingDate">Starting Date</label>
                                <input v-model="form.startingDate" class="form-control form-control-md input-small mx-auto" type="date" id="startingDate" />
                            </div>

                            <div class="mb-3">
                                <label class="text-white mb-2" for="endDate">End Date</label>
                                <input v-model="form.endDate" class="form-control form-control-md input-small mx-auto" type="date" id="endDate" />
                            </div>
                        </div>

                        <div class="d-flex justify-content-around">
                            <div class="mb-3">
                                <label class="text-white mb-2" for="kilometers"
                                    >How many kilometers?</label
                                >
                                <input
                                    v-model="form.kilometers"
                                    class="form-control form-control-md input-small mx-auto"
                                    type="number"
                                    id="kilometers"
                                    placeholder="0-20000 Km"
                                />
                            </div>
    
                            <div class="mb-3">
                                <label class="text-white mb-2" for="startingTime">Starting Time</label>
                                <input v-model="form.startingTime" class="form-control form-control-md input-small mx-auto" type="time" id="startingTime" />
                            </div>    
                        </div>

                        <div class="d-flex justify-content-around">
                            <div class="mb-3">
                                <label class="text-white mb-2" for="startingPoint"
                                    >Select starting point</label
                                >
                                <div class="dropdown">
                                    <button
                                        class="btn btn-secondary dropdown-toggle"
                                        type="button"
                                        data-bs-toggle="dropdown"
                                    >
                                        {{
                                            form.selectedStartingAddress
                                                ? form.selectedStartingAddress
                                                : "Select Starting Point"
                                        }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <p
                                                class="dropdown-item mb-0"
                                                @click="
                                                    form.selectedStartingAddress =
                                                        'Lidosta Rīga'
                                                "
                                            >
                                                Lidosta Rīga
                                            </p>
                                        </li>
                                        <li>
                                            <p
                                                class="dropdown-item mb-0"
                                                @click="
                                                    form.selectedStartingAddress =
                                                        'Aspazijas bulvāris 32'
                                                "
                                            >
                                                Aspazijas bulvāris 32
                                            </p>
                                        </li>
                                        <li>
                                            <p
                                                class="dropdown-item mb-0"
                                                @click="
                                                    form.selectedStartingAddress =
                                                        'Brīvības iela 366'
                                                "
                                            >
                                                Brīvības iela 366
                                            </p>
                                        </li>
                                        <li>
                                            <input
                                                v-model="form.selectedStartingAddress"
                                                class="form-control"
                                                type="text"
                                                placeholder="Enter custom starting point"
                                            />
                                        </li>
                                    </ul>
                                </div>
                            </div>
    
                            <div class="mb-3">
                                <label class="text-white mb-2" for="startingPoint"
                                    >Select Ending point</label
                                >
                                <div class="dropdown">
                                    <button
                                        class="btn btn-secondary dropdown-toggle"
                                        type="button"
                                        data-bs-toggle="dropdown"
                                    >
                                        {{
                                            form.selectedEndingAddress
                                                ? form.selectedEndingAddress
                                                : "Select Starting Point"
                                        }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <p
                                                class="dropdown-item mb-0"
                                                @click="
                                                    form.selectedEndingAddress =
                                                        'Lidosta Rīga'
                                                "
                                            >
                                                Lidosta Rīga
                                            </p>
                                        </li>
                                        <li>
                                            <p
                                                class="dropdown-item mb-0"
                                                @click="
                                                    form.selectedEndingAddress =
                                                        'Aspazijas bulvāris 32'
                                                "
                                            >
                                                Aspazijas bulvāris 32
                                            </p>
                                        </li>
                                        <li>
                                            <p
                                                class="dropdown-item mb-0"
                                                @click="
                                                    form.selectedEndingAddress =
                                                        'Brīvības iela 366'
                                                "
                                            >
                                                Brīvības iela 366
                                            </p>
                                        </li>
                                        <li>
                                            <input
                                                v-model="form.selectedEndingAddress"
                                                class="form-control"
                                                type="text"
                                                placeholder="Enter custom starting point"
                                            />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="">
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
            kilometers: null,
            selectedStartingAddress: "",
            selectedEndingAddress: "",
            startingDate: "",
            endDate: "",
            startingTime: "",
            carId: props.car.id,
            totalPrice: 0
        });

        const calculateTripDuration = () => {
            const endDate = new Date(form.endDate);
            const startDate = new Date(form.startingDate);

            const tripDuration = Math.ceil((endDate.getTime() - startDate.getTime()) / (1000*3600*24))
        
            return tripDuration;
        };

        const calculateTotalPrice = () => {
            const pricePerDay = props.car.price_per_day;
            const pricePerKm = props.car.price_per_km;

            const tripDuration = calculateTripDuration();

            const totalDaysPrice = tripDuration * pricePerDay;
            const totalKmPrice = form.kilometers * pricePerKm;

            let totalPrice = totalDaysPrice + totalKmPrice;

            const startingAddresses = ['Lidosta Rīga', 'Aspazijas bulvāris 32', 'Brīvības iela 366'];

            const endingAddresses = ['Lidosta Rīga', 'Aspazijas bulvāris 32', 'Brīvības iela 366'];

            if(!startingAddresses.includes(form.selectedStartingAddress)) {
                totalPrice += 10;
            }

            if(!endingAddresses.includes(form.selectedEndingAddress)) {
                totalPrice += 10;
            }

            if (totalPrice >= 1000) {
                totalPrice *= 0.85;
            } else if (totalPrice >= 500) {
                totalPrice *= 0.9;
            }else if (totalPrice >= 200) {
                totalPrice *= 0.94;
            } else if (totalPrice >= 100) {
                totalPrice *= 0.97;
            }

            totalPrice = parseFloat(totalPrice.toFixed(2));
            
            return totalPrice;
        };

        const submitForm = () => {
            const totalPrice = calculateTotalPrice();
            form.totalPrice = totalPrice;
            form.post(`/cars/${props.car.id}`);
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

input {
    width: 400px;
}
</style>
