<template>
    <section class="bg-primary sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <div class="container-fluid px-0">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item d-flex align-items-center m-0">
                                <i class="bi bi-car-front text-warning h2 my-0 me-1" aria-label="car icon"></i>
                                <Link :href="route('home')" class="navbar-brand text-warning me-0"
                                    aria-label="home page">
                                Baltic Drive Rentals
                                </Link>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item d-flex align-items-center me-3 my-2 my-lg-0">
                                <i class="bi bi-file-earmark-ruled text-white" aria-label="rental terms icon"></i>
                                <Link :href="route('terms')" class="nav-link p-1" :class="{
                                    'text-secondary': !$page.url.includes('/terms'),
                                    'text-white': $page.url.includes('/terms'),
                                }" aria-label="rental terms page">Rental Terms</Link>
                            </li>
                            <li class="nav-item d-flex align-items-center me-3 my-2 my-lg-0">
                                <i class="bi bi-car-front-fill text-white" aria-label="our car list icon"></i>
                                <Link :href="route('cars')" class="nav-link p-1" :class="{
                                    'text-secondary': $page.url !== '/cars',
                                    'text-white': $page.url === '/cars',
                                }" aria-label="our car list page">Our Car List</Link>
                            </li>

                            <li v-if="$page.props.auth"
                                class="nav-item d-flex align-items-center ms-0 ms-lg-4 me-3 my-2 my-lg-0">
                                <i class="bi bi-person-circle text-white" aria-label="profile page icon"></i>
                                <Link :href="route('profile', { user: $page.props.auth })" class="nav-link p-1" :class="{
                                    'text-secondary': !$page.url.includes('/profile'),
                                    'text-white': $page.url.includes('/profile'),
                                }" aria-label="profile page">Profile Page</Link>
                            </li>

                            <li v-if="$page.props.auth && $page.props.isAdmin"
                                class="nav-item d-flex align-items-center ms-0 me-3 my-2 my-lg-0">
                                <i class="bi bi-gear-fill text-white" aria-label="admin panel icon"></i>
                                <Link :href="route('admin')" class="nav-link p-1 text-white" :class="{
                                    'text-secondary': !$page.url.includes('/admin'),
                                    'text-white': $page.url.includes('/admin'),
                                }" aria-label="admin panel">Admin Panel</Link>
                            </li>

                            <li v-if="$page.props.auth" class="nav-item d-flex align-items-center my-2 my-lg-0 me-0">
                                <i class="bi bi-box-arrow-right text-white" aria-label="log out icon"></i>
                                <Link :href="route('logout')" class="nav-link p-1 text-white" aria-label="log out">Log
                                Out</Link>
                            </li>

                            <li v-if="!$page.props.auth" class="nav-item d-flex align-items-center my-2 my-lg-0">
                                <i class="bi bi-box-arrow-in-right text-white ms-0 ms-lg-5"
                                    aria-label="log in icon"></i>
                                <Link :href="route('login')" class="nav-link p-1" :class="{
                                    'text-secondary': !$page.url.includes('/login'),
                                    'text-white': $page.url === '/login',
                                }" aria-label="log in">Log In</Link>
                            </li>

                            <li v-if="!$page.props.auth" class="nav-item d-flex align-items-center my-2 my-lg-0">
                                <i class="bi bi-box-arrow-in-left text-white" aria-label="register icon"></i>
                                <Link :href="route('register')" class="nav-link p-1" :class="{
                                    'text-secondary': !$page.url.includes('/register'),
                                    'text-white': $page.url === '/register',
                                }" aria-label="register">Register</Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>
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
