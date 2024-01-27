<template>
    <section class="p-5 bg-primary mt-5">
        <div class="container mt-4">
            <div class="d-flex align-items-center justify-content-between">
                <img
                    class="img-fluid w-50 rounded img-zoom"
                    :src="teslaImage"
                    alt=""
                />
                <div class="ms-5">
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
