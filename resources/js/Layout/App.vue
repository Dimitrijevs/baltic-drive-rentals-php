<template>
    <Navbar />

    <slot />

    <Footer />
</template>

<script>
import Navbar from "./Components/Navbar.vue";
import Footer from "./Components/Footer.vue";

export default {
    components: {
        Navbar,
        Footer,
    },
};
</script>

<style></style>
