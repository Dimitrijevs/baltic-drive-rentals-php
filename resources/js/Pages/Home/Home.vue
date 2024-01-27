<template>
    <Layout>
        <Mobility :mazdaImage="mazdaImage" />
        <Advantages />
        <NewApproach :teslaImage="teslaImage" />
        <Latest :cars="cars" />
    </Layout>
</template>

<script>
import Layout from "../../Layout/App.vue";
import Mobility from './Components/Mobility.vue';
import Advantages from './Components/Advantages.vue';
import NewApproach from './Components/NewApproach.vue';
import Latest from "./Components/Latest.vue";

export default {
    components: {
        Layout,
        Mobility,
        Advantages,
        NewApproach,
        Latest,
    },
    props: {
        mazdaImage: {
            type: String,
            required: true
        },
        teslaImage: {
            type: String,
            required: true
        },
        cars: {
            type: Array,
            required: true
        }
    }
}
</script>

<style></style>
