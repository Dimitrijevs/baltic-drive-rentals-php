<template>
    <Layout>
        <div v-if="$page.props.isAdmin" id="create" class="text-center mb-0" role="region" aria-label="Admin Actions">
            <a :href="route('cars.create')" class="btn btn-warning text-primary pb-2 align-items-center">
                <div class="d-flex">
                    <i class="bi bi-car-front-fill h4 me-1"></i>
                    <p class="mb-0">
                        Add New Car
                    </p>
                </div>
            </a>
        </div>

        <div class="box d-flex mx-auto my-3 justify-content-center" role="region" aria-label="Filter and Car Results">
            <div class="left">
                <Sort @sort="handleSort" />

                <Filter @setPricePerKmFilter="handlePricePerKmFilter" @setPriceFilter="handleSetPriceFilter"
                    @setGearboxFilter="handleGearboxFilter" @updateFuelTypeFilter="handleFuelTypeFilter"
                    @updateBodyTypeFilter="handleBodyTypeFilter" @updateBrandFilter="handleBrandFilter"
                    @setEmissionsilter="updateEmissionsilter" />
            </div>

            <div class="right w-75">
                <div class="w-100">
                    <Search @search="handleSearch" />
                </div>

                <section class="bg-light mt-2 rounded">
                    <div class="p-2">
                        <div class="container text-center">
                            <div class="row justify-content-between">
                                <div class="" v-if="filteredCars.length === 0" role="status" aria-live="polite">
                                    This record doesn't exist
                                </div>
                                <div class="card col-lg-3 col-md-5 p-0 m-3 bg-primary text-light border-primary"
                                    v-for="car in filteredCars" :key="car.id" role="listitem">
                                    <img :src="car.carImageURL" class="card-img-top img-fluid" alt="Car Image" />
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
                                            <Link :href="route('car.show', car.id)"
                                                class="btn btn-warning mb-3 img-zoom text-primary">
                                            <i class="bi bi-chevron-right"></i> Read More
                                            </Link>
                                            <button v-if="$page.props.auth"
                                                class="btn btn-light border-none ms-2 px-2 py-0 btn-48"
                                                @click="toggleLike(car.id)">
                                                <div class="d-flex align-items-center m-0">
                                                    {{ car.likesCount }}
                                                    <i class="bi h4 text-danger ms-1 mt-2"
                                                        :class="{ 'bi-heart-fill': car.isLikedByUser, 'bi-heart': !car.isLikedByUser }"
                                                        aria-label="Like"></i>
                                                </div>
                                            </button>
                                            <Link v-if="!$page.props.auth" :href="route('login')">
                                            <button class="btn btn-light border-none ms-2 px-2 py-2 btn-48"
                                                aria-label="Login to Like">
                                                <div class="d-flex align-items-center m-0">
                                                    {{ car.likesCount }}
                                                    <i class="bi bi-heart h4 text-danger ms-1 mt-2"
                                                        aria-hidden="true"></i>
                                                </div>
                                            </button>
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "../../Layout/App.vue";
import { Link } from "@inertiajs/vue3";
import Search from "./Components/Search.vue";
import Filter from "./Components/Filter.vue";
import Sort from "./Components/Sort.vue";

export default {
    components: {
        Layout,
        Link,
        Search,
        Filter,
        Sort,
    },
    props: {
        cars: {
            type: Array,
            required: true
        },
        pagination: {
            type: String,
            required: true
        },
    },
    data() {
        return {
            isPressed: {},
            searchFilter: '',
            pricePerKmFilter: '',
            pricePerDayFilter: '',
            gearboxFilter: [],
            fuelTypeFilters: [],
            emissionsFilter: '',
            bodyTypeFilters: [],
            brandFilters: [],
            sortedCars: [],
        }
    },
    methods: {
        toggleLike(carId) {
            this.$inertia.post(`/cars/${carId}/like`, { filteredCars: this.filteredCars }, { preserveScroll: true })
        },
        handleSearch(search) {
            this.searchFilter = search;
        },
        handlePricePerKmFilter(pricePerKm) {
            this.pricePerKmFilter = pricePerKm;
        },
        handleSetPriceFilter(pricePerDay) {
            this.pricePerDayFilter = pricePerDay;
        },
        handleGearboxFilter(gearbox) {
            if (this.gearboxFilter.includes(gearbox)) {
                this.gearboxFilter.splice(this.gearboxFilter.indexOf(gearbox), 1);
            } else {
                this.gearboxFilter.push(gearbox);
            }
        },
        handleFuelTypeFilter(fuelType) {
            if (this.fuelTypeFilters.includes(fuelType)) {
                this.fuelTypeFilters.splice(this.fuelTypeFilters.indexOf(fuelType), 1);
            } else {
                this.fuelTypeFilters.push(fuelType);
            }
        },
        updateEmissionsilter(emissions) {
            this.emissionsFilter = emissions;
        },
        handleBodyTypeFilter(bodyType) {
            if (this.bodyTypeFilters.includes(bodyType)) {
                this.bodyTypeFilters.splice(this.bodyTypeFilters.indexOf(bodyType), 1);
            } else {
                this.bodyTypeFilters.push(bodyType);
            }
        },
        handleBrandFilter(brand) {
            if (this.brandFilters.includes(brand)) {
                this.brandFilters.splice(this.brandFilters.indexOf(brand), 1);
            } else {
                this.brandFilters.push(brand);
            }
        },
        handleSort(value) {
            console.log(value);
            if (value === 'cheapToExpensiveDay') {
                this.cars.sort((a, b) => a.price_per_day - b.price_per_day);
            } else if (value === 'expensiveToCheapDay') {
                this.cars.sort((a, b) => b.price_per_day - a.price_per_day);
            } else if (value === 'cheapToExpensiveKM') {
                this.cars.sort((a, b) => a.price_per_km - b.price_per_km);
            } else if (value === 'expensiveToCheapKM') {
                this.cars.sort((a, b) => b.price_per_km - a.price_per_km);
            } else if (value === 'mostPopular') {
                this.cars.sort((a, b) => b.likesCount - a.likesCount);
            } else if (value === 'leastPopular') {
                this.cars.sort((a, b) => a.likesCount - b.likesCount);
            }
        }
    },
    computed: {
        filteredCars() {
            let cars = this.cars;

            if (this.pricePerKmFilter !== '') {
                cars = cars.filter(car => car.price_per_km <= this.pricePerKmFilter);
            }

            if (this.pricePerDayFilter !== '') {
                cars = cars.filter(car => car.price_per_day <= this.pricePerDayFilter);
            }

            if (this.gearboxFilter.length > 0) {
                cars = cars.filter(car => this.gearboxFilter.includes(car.gearbox));
            }

            if (this.fuelTypeFilters.length > 0) {
                cars = cars.filter(car => this.fuelTypeFilters.includes(car.fuel_type));
            }

            if (this.emissionsFilter !== '') {
                cars = cars.filter(car => car.emissions <= this.emissionsFilter);
            }

            if (this.bodyTypeFilters.length > 0) {
                cars = cars.filter(car => this.bodyTypeFilters.includes(car.body_type));
            }

            if (this.brandFilters.length > 0) {
                cars = cars.filter(car => this.brandFilters.includes(car.brand));
            }

            if (this.sortedCars.length > 0) {
                cars = this.sortedCars;
            }

            if (this.searchFilter !== '') {
                cars = cars.filter(car => car.brand.toLowerCase().includes(this.searchFilter.toLowerCase()) ||
                    car.model.toLowerCase().includes(this.searchFilter.toLowerCase()) ||
                    car.body_type.toLowerCase().includes(this.searchFilter.toLowerCase()) ||
                    car.fuel_type.toLowerCase().includes(this.searchFilter.toLowerCase()) ||
                    car.gearbox.toLowerCase().includes(this.searchFilter.toLowerCase()));
            }

            return cars;
        }
    }
}
</script>

<style scoped>
.logo {
    width: 100px;
}

#create {
    margin-top: 20px;
}

.btn-48 {
    height: 48px;
}
</style>
