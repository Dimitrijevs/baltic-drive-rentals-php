<template>
    <section class="p-lg-5 pt-2 bg-primary" aria-labelledby="mobilityHeader">
        <div class="container mt-4">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 text-white">
                    <h1 id="mobilityHeader" class="text-white">
                        Mobility
                        <span class="text-warning">when you need it!</span>
                    </h1>
                    <p class="lead">
                        Introducing our unbeatable mobility solution tailored
                        just for you! Say goodbye to transportation hassles and
                        hello to the freedom of movement with our incredible
                        offer starting at an unbeatable 14 € per day.
                    </p>
                    <a class="btn btn-warning p-2 img-zoom"
                        href="https://play.google.com/store/apps/details?id=com.primeleasing.citybee&hl=en&pli=1">Download
                        App!</a>
                </div>
                <div class="col-lg-6 text-center">
                    <img class="img-fluid rounded hover-shadow" :src="mazdaImage" alt="image not found" />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: {
        mazdaImage: {
            type: String,
            required: true
        }
    }
};
</script>

<style></style>
