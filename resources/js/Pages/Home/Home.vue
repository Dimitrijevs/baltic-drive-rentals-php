<template>
    <Layout>
        <Message />
        <Mobility :mazdaImage="mazdaImage" />
        <Advantages />
        <NewApproach :teslaImage="teslaImage" />
        <Latest :cars="cars" />
        <GetStarted :getStartedURLs="getStartedURLs" />
        <FreeParking :parkingImage="parkingImage" />
        <FAQ />
        <ContactUs />
    </Layout>
</template>

<script>
import Layout from "../../Layout/App.vue";
import Message from "./Components/Message.vue";
import Mobility from "./Components/Mobility.vue";
import Advantages from "./Components/Advantages.vue";
import NewApproach from "./Components/NewApproach.vue";
import Latest from "./Components/Latest.vue";
import GetStarted from "./Components/GetStarted.vue";
import FreeParking from "./Components/FreeParking.vue";
import FAQ from "./Components/FAQ.vue";
import ContactUs from "./Components/ContactUs.vue";

export default {
    components: {
        Layout,
        Message,
        Mobility,
        Advantages,
        NewApproach,
        Latest,
        GetStarted,
        FreeParking,
        FAQ,
        ContactUs,
    },
    props: {
        mazdaImage: {
            type: String,
            required: true,
        },
        teslaImage: {
            type: String,
            required: true,
        },
        cars: {
            type: Array,
            required: true,
        },
        getStartedURLs: {
            type: Array,
            required: true,
        },
        parkingImage: {
            type: String,
            required: true,
        },
    },
};
</script>

<style></style>
