<template>
    <footer class="bg-primary text-white text-center p-4">
        <div class="container">

            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item">
                    <Link :href="route('home')" class="nav-link px-2 text-white" aria-label="home page">Home</Link>
                </li>
                <li class="nav-item">
                    <Link :href="route('learn')" class="nav-link px-2 text-white" aria-label="learn page">Learn</Link>
                </li>
                <li class="nav-item">
                    <Link :href="route('terms')" class="nav-link px-2 text-white"
                        aria-label="terms and conditions page">Terms</Link>
                </li>
                <li class="nav-item">
                    <Link :href="route('cars')" class="nav-link px-2 text-white" aria-label="cars page">Cars</Link>
                </li>
                <li v-if="$page.props.auth" class="nav-item">
                    <Link :href="route('profile', { user: $page.props.auth })" class="nav-link px-2 text-white"
                        aria-label="profile page">Profile</Link>
                </li>
                <li v-if="!$page.props.auth" class="nav-item">
                    <Link :href="route('login')" class="nav-link px-2 text-white" aria-label="login page">Login</Link>
                </li>
            </ul>
            <p class="lead text-light">
                Copyright © 2024
                <span class="text-warning">Baltic Drive Rental</span>
            </p>
        </div>
    </footer>
</template>


<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    props: {
        auth: Object,
    },
};
</script>

<style scoped></style>
