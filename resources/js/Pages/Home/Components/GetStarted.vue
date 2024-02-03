<template>
    <section class="p-5 bg-primary mt-5">
        <div class="container p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-warning">
                    <h1 class="text-warning">Easy to get started!</h1>
                    <p class="lead text-light">1. Registration, takes about 1 minute!</p>
                    <p class="lead text-light">2. Order a car!</p>
                    <p class="lead text-light">3. Receive it the next day at your home!</p>
                </div>
                <div id="carouselCars" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img :src="getStartedURLs[0]"
                                class="img-fluid zoom-effect rounded" alt="">
                        </div>
                        <div class="carousel-item">
                            <img :src="getStartedURLs[1]"
                                class="img-fluid rounded" alt="">
                        </div>
                        <div class="carousel-item">
                            <img :src="getStartedURLs[2]"
                                class="img-fluid rounded" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: {
        getStartedURLs: {
            type: Array,
            required: true
        }
    }
}
</script>

<style>
    .carousel-inner {
        height: 400px;
        width: 800px;
    }
</style>