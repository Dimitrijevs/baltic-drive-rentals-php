<template>
    <section class="p-5 my-5">
        <div class="container mt-4">
            <div class="d-flex align-items-center justify-content-between">
                <img
                    class="img-fluid w-50 rounded img-zoom"
                    :src="parkingImage"
                    alt=""
                />
                <div class="ms-5">
                    <h1 class="text-primary">
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
