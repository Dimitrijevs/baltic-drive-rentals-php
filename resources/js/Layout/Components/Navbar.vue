<template>
    <nav
        id="nav-bar"
        class="navbar navbar-expand-lg bg-primary navbar-dark py-3 fixed-top z-2"
    >
        <div class="container">
            <li class="nav-item d-flex align-items-center">
                <i class="bi bi-car-front text-warning h2 my-0 me-1"></i>
                <Link :href="route('home')" class="navbar-brand text-warning"
                    >Baltic Drive Rentals</Link
                >
            </li>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-flex align-items-center mx-2">
                        <i class="bi bi-clock-history text-white"></i
                        ><Link
                            :href="route('learn')"
                            class="{{ Route::is('learn') ? 'active' : '' }} nav-link p-1"
                            >Learn to drive</Link
                        >
                    </li>

                    <li class="nav-item d-flex align-items-center mx-2">
                        <i class="bi bi-file-earmark-ruled text-white"></i
                        ><Link
                            :href="route('terms')"
                            class="{{ Route::is('terms') ? 'active' : '' }} nav-link p-1"
                            >Rental Terms</Link
                        >
                    </li>

                    <li class="nav-item d-flex align-items-center mx-2">
                        <i class="bi bi-car-front-fill text-white"></i
                        ><Link
                            :href="route('cars')"
                            class="{{ Route::is('cars') ? 'active' : '' }} nav-link p-1"
                            >Our Car List</Link
                        >
                    </li>

                    <li class="nav-item d-flex align-items-center mx-2">
                        <i class="bi bi-box-arrow-in-right text-white ms-5"></i
                        ><Link
                            :href="route('login')"
                            class="{{ Route::is('login') ? 'active' : '' }} nav-link p-1"
                            >Log In</Link
                        >
                    </li>

                    <li class="nav-item d-flex align-items-center mx-2">
                        <i class="bi bi-box-arrow-in-right text-white"></i
                        ><Link
                            :href="route('register')"
                            class="{{ Route::is('register') ? 'active' : '' }} nav-link p-1"
                            >Register</Link
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
};
</script>

<style></style>
