<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <SideBar aria-label="sidebar navigation" />
                </div>
                <div class="col-lg-9">
                    <div class="row my-3">
                        <UsersCount :users="users" aria-label="users count" />
                        <AdminsCount :admins="admins" aria-label="admins count" />
                    </div>
                    <div class="row">
                        <CarsCount :cars="cars" aria-label="cars count" />
                        <TermsCount :terms="terms" aria-label="terms count" />
                    </div>
                    <div class="row my-3">
                        <CommentsCount :comments="comments" aria-label="comments count" />
                        <ReservationsCount :money="money" aria-label="reservations count" />
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "../../Layout/App.vue";
import { Link } from "@inertiajs/vue3";
import SideBar from "./Partials/SideBar.vue";
import UsersCount from "./Partials/UsersCount.vue";
import CarsCount from "./Partials/CarsCount.vue";
import AdminsCount from './Partials/AdminsCount.vue';
import TermsCount from './Partials/TermsCount.vue';
import CommentsCount from './Partials/CommentsCount.vue'
import ReservationsCount from './Partials/ReservationsCount.vue';

export default {
    components: {
        Layout,
        Link,
        SideBar,
        UsersCount,
        CarsCount,
        AdminsCount,
        TermsCount,
        CommentsCount,
        ReservationsCount,
    },
    props: {
        users: {
            type: Number,
            required: true,
        },
        cars: {
            type: Number,
            required: true,
        },
        admins: {
            type: Number,
            required: true,
        },
        terms: {
            type: Number,
            required: true,
        },
        comments: {
            type: Number,
            required: true,
        },
        money: {
            type: Number,
            required: true,
        },
    },
};

</script>

<style></style>