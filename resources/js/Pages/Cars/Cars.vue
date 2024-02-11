<template>
    <Layout>

        <div class="box d-flex mx-auto mb-5 justify-content-center">
            <div class="left">
                <form action="">
                    <div class="filter rounded bg-light p-4 me-2">
                        <div class="filter-box">
                            <h4>Brand</h4>
                            <div class="one-line">
                                <label for="audiCheckbox"><input type="checkbox" id="audiCheckbox" name="brands[]" value="Audi">
                                    Audi</label>
                            </div>
                            <div class="one-line">
                                <label for="bmwCheckbox"><input type="checkbox" id="bmwCheckbox" name="brands[]" value="BMW">
                                    BMW</label>
                            </div>
                            <div class="one-line">
                                <label for="mazdaCheckbox"><input type="checkbox" id="mazdaCheckbox" name="brands[]" value="Mazda">
                                    Mazda</label>
                            </div>
                            <div class="one-line">
                                <label for="skodaCheckbox"><input type="checkbox" id="skodaCheckbox" name="brands[]" value="Skoda">
                                    Skoda</label>
                            </div>
                            <div class="one-line">
                                <label for="teslaCheckbox"><input type="checkbox" id="teslaCheckbox" name="brands[]" value="Tesla">
                                    Tesla</label>
                            </div>
                            <div class="one-line">
                                <label for="toyotaCheckbox"><input type="checkbox" id="toyotaCheckbox" name="brands[]"
                                        value="Toyota"> Toyota</label>
                            </div>
                            <div class="one-line">
                                <label for="vwCheckbox"><input type="checkbox" id="vwCheckbox" name="brands[]" value="Volkswagen">
                                    VW</label>
                            </div>
                            <hr>
                        </div>
        
                        <div class="filter-box">
                            <h4>Body Type</h4>
                            <div class="one-line">
                                <label for="cabrioletCheckbox"><input type="checkbox" id="cabrioletCheckbox" name="body_types[]"
                                        value="Cabriolet"> Cabriolet</label>
                            </div>
                            <div class="one-line">
                                <label for="estateCheckbox"><input type="checkbox" id="estateCheckbox" name="body_types[]"
                                        value="Estate"> Estate</label>
                            </div>
                            <div class="one-line">
                                <label for="hatchbackCheckbox"><input type="checkbox" id="hatchbackCheckbox" name="body_types[]"
                                        value="Hatchback"> Hatchback</label>
                            </div>
                            <div class="one-line">
                                <label for="sedanCheckbox"><input type="checkbox" id="sedanCheckbox" name="body_types[]"
                                        value="Sedan"> Sedan</label>
                            </div>
                            <div class="one-line">
                                <label for="suvCheckbox"><input type="checkbox" id="suvCheckbox" name="body_types[]"
                                        value="Crossover"> Crossover</label>
                            </div>
                            <hr>
                        </div>
        
                        <div class="filter-box">
                            <h4>Fuel Type</h4>
                            <div class="one-line">
                                <label for="dieselCheckbox"><input type="checkbox" id="dieselCheckbox"> Diesel</label>
                            </div>
                            <div class="one-line">
                                <label for="electricCheckbox"><input type="checkbox" id="electricCheckbox"> Electric</label>
                            </div>
                            <div class="one-line">
                                <label for="hybridCheckbox"><input type="checkbox" id="hybridCheckbox"> Hybrid (Petrol +
                                    Electric)</label>
                            </div>
                            <div class="one-line">
                                <label for="petrolCheckbox"><input type="checkbox" id="petrolCheckbox"> Petrol</label>
                            </div>
                            <hr>
                        </div>
        
                        <div class="filter-box">
                            <h4>Gearbox</h4>
                            <div class="one-line">
                                <label for="automaticCheckbox"><input type="checkbox" id="automaticCheckbox"> Automatic</label>
                            </div>
                            <div class="one-line">
                                <label for="manualCheckbox"><input type="checkbox" id="manualCheckbox"> Manual</label>
                            </div>
                            <hr>
                        </div>
        
                        <div class="filter-box one-select">
                            <h4>Price</h4>
                            <div class="one-line">
                                <label for="upTo20Checkbox"><input type="radio" name="priceRange" id="upTo20Checkbox"> Up to
                                    20€</label>
                            </div>
                            <div class="one-line">
                                <label for="upTo30Checkbox"><input type="radio" name="priceRange" id="upTo30Checkbox"> Up to
                                    30€</label>
                            </div>
                            <div class="one-line">
                                <label for="upTo50Checkbox"><input type="radio" name="priceRange" id="upTo50Checkbox"> Up to
                                    50€</label>
                            </div>
                            <div class="one-line">
                                <label for="upTo70Checkbox"><input type="radio" name="priceRange" id="upTo70Checkbox"> Up to
                                    70€</label>
                            </div>
                            <div class="one-line">
                                <label for="upTo100Checkbox"><input type="radio" name="priceRange" id="upTo100Checkbox"> Up to
                                    100€</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning text-primary py-2 px-3">Apply</button>
                </form>
            </div>
    
            <div class="right">
                <div class="brands p-4 rounded bg-light mb-2 d-flex">
                    <img class="img-zoom mx-auto my-3 logo" :src="carBrandsImages[0]" alt="#">
                    <img class="img-zoom mx-auto my-3 logo" :src="carBrandsImages[1]" alt="#">
                    <img class="img-zoom mx-auto my-3 logo" :src="carBrandsImages[2]" alt="#">
                    <img class="img-zoom mx-auto my-3 logo" :src="carBrandsImages[3]" alt="#">
                    <img class="img-zoom mx-auto my-3 logo" :src="carBrandsImages[4]" alt="#">
                </div>

                <section class="bg-light mt-2 rounded">
                    <div class="p-5">
                        <div class="container text-center">
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
                                <div v-html="pagination"></div>
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
import { Link, useForm } from "@inertiajs/vue3";

export default {
    components: {
        Layout,
        Link,
    },
    props: {
        carBrandsImages: {
            type: Array,
            required: true
        },
        cars: {
            type: Array,
            required: true
        },
        pagination: {
            type: String,
            required: true
        },
    }
}
</script>

<style scoped>
    .logo {
        width: 120px;
    }

    .box {
        margin-top: 120px
    }
</style>