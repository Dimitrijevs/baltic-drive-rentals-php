<template>
    <section class="p-5 bg-primary mt-5">
        <div class="container mt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 mb-4 mb-lg-0 text-center">
                    <img
                        class="img-fluid rounded img-zoom"
                        :src="teslaImage"
                        alt=""
                    />
                </div>
                <div class="col-lg-6">
                    <h1 class="text-white">
                        <span class="text-warning">A new approach</span> to
                        mobility!
                    </h1>
                    <p class="lead text-light">
                        "Baltic Drive Rentls" aims to create a cleaner and more
                        open city. How? One "Baltic Drive Rentls" car that can
                        be shared can replace up to 12 private cars that most of
                        the time stand still and fill neighborhoods and streets.
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: {
        teslaImage: {
            type: String,
            required: true
        }
    }
};
</script>

<style></style>
