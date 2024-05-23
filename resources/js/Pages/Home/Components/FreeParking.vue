<template>
    <section class="p-0 p-lg-5 my-5" aria-labelledby="parkingSectionHeading">
        <div class="container mt-4">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <img class="img-fluid rounded img-zoom" :src="parkingImage" alt="" aria-hidden="true" />
                </div>
                <div class="col-lg-6 mt-3 mt-lg-0">
                    <h1 class="text-primary" id="parkingSectionHeading">
                        Now Parking is <span class="text-warning">Free!</span>
                    </h1>
                    <p class="lead text-primary">
                        At Baltic Drives Rentals, parking for our cars is always
                        complimentary, even in paid parking areas. Enjoy the
                        convenience of hassle-free parking wherever you go,
                        knowing that you won't incur any additional fees during
                        your rental period.
                    </p>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
export default {
    props: {
        parkingImage: {
            type: String,
            required: true,
        },
    },
};
</script>

<style></style>
