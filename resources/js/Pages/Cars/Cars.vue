<template>
    <Layout>
        <div v-if="$page.props.isAdmin" id="create" class="d-flex justify-content-center mb-0">
            <a :href="route('cars.create')" class="bg-primary nav-link h1 text-primary bg-warning py-3 px-4 rounded">Add
                New Car</a>
        </div>

        <div class="box d-flex mx-auto my-3 justify-content-center">

            <Filter @setPricePerKmFilter="handlePricePerKmFilter" @setPriceFilter="handleSetPriceFilter"
                @setGearboxFilter="handleGearboxFilter" @updateFuelTypeFilter="handleFuelTypeFilter"
                @updateBodyTypeFilter="handleBodyTypeFilter" @updateBrandFilter="handleBrandFilter" @setEmissionsilter="updateEmissionsilter" />

            <div class="right">
                <div class="w-100">
                    <Search @search="handleSearch" />
                </div>

                <section class="bg-light mt-2 rounded">
                    <div class="p-5">
                        <div class="container text-center">
                            <div class="row justify-content-between">
                                <div class="width-1100" v-if="filteredCars.length === 0">This record doesnt exists</div>
                                <div class="card col-12 col-md-5 col-lg-3 p-0 m-3 bg-primary text-light border-primary"
                                    v-for="car in filteredCars" :key="car.id">
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

export default {
    components: {
        Layout,
        Link,
        Search,
        Filter,
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
        }
    },
    methods: {
        toggleLike(carId) {
            this.$inertia.post(`/cars/${carId}/like`, {}, { preserveScroll: true })
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

.width-1100 {
    width: 1400px;
}
</style>
