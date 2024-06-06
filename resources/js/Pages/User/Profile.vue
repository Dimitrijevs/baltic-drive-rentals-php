<template>
    <Layout>
        <section style="background-color: #eee;">
            <div class="container py-3">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card py-2 mb-4" role="region" aria-labelledby="profile-section">
                            <div class="card-body text-center py-4">
                                <img id="avatar" :src="user.avatar" alt="profile image"
                                    class="rounded-circle img-fluid border border-primary"
                                    style="width: 180px; height: 180px;" />
                                <div class="mb-4 mt-2">
                                    <h5 id="profile-section" class="mb-0">Profile</h5>
                                    <p class="my-0">{{ user.name }}</p>
                                </div>

                                <ul class="list-group rounded-3">
                                    <h5 class="mb-0">Actions</h5>
                                    <li
                                        class="border-0 list-group-item d-flex justify-content-center align-items-center pt-2 px-5">
                                        <Link :href="route('edit', { user: $page.props.auth })"
                                            class="btn btn-primary d-block py-2 w-100" aria-label="Edit Profile">
                                        <i class="bi bi-person-lines-fill me-2"></i> Edit Profile
                                        </Link>
                                    </li>
                                    <li
                                        class="border-0 list-group-item d-flex justify-content-center align-items-center pt-2 px-5">
                                        <Link :href="route('logout')" class="btn btn-primary d-block py-2 w-100"
                                            aria-label="Log Out">
                                        <i class="bi bi-box-arrow-right me-2"></i> Log Out
                                        </Link>
                                    </li>
                                    <li
                                        class="border-0 list-group-item d-flex justify-content-center align-items-center px-5">
                                        <likedCars :likedCars="likedCars" />
                                    </li>
                                    <li
                                        class="border-0 list-group-item d-flex justify-content-center align-items-center pb-0 px-5">
                                        <button @click="destroy(user.id)" type="submit"
                                            class="btn btn-danger d-block py-2 w-100" aria-label="Delete Account">
                                            <i class="bi bi-trash-fill me-2"></i> Delete Account
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4" role="region" aria-labelledby="user-info-section">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="mb-0 text-end fw-bold">{{ user.name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="mb-0 text-end fw-bold">{{ user.email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone number</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="mb-0 text-end fw-bold">{{ user.phone_number }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Account created at</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="mb-0 text-end fw-bold">{{ moment(user.created_at).format("DD-MM-YYYY")
                                            }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" role="region" aria-labelledby="reservations-section">
                                    <div class="card-body" style="height: 300px; overflow-y: auto;">
                                        <h3 id="reservations-section" class="text-center">Rents</h3>
                                        <table v-if="reservations"
                                            class="table table-sm table-striped table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Car</th>
                                                    <th scope="col">Start Date</th>
                                                    <th scope="col">End Date</th>
                                                    <th scope="col">
                                                        <div class="text-center">Drive distance (Km)</div>
                                                    </th>
                                                    <th scope="col">
                                                        <div class="text-center">Total price (€)</div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="reservation in reservations">
                                                    <td class="p-0">
                                                        <div :class="{
                                                            'bg-success': isCurrentReservation(reservation.start_date, reservation.end_date),
                                                            'bg-warning': isPastReservation(reservation.end_date),
                                                            'bg-info': isFutureReservation(reservation.start_date)
                                                        }" class="text-center p-2 my-1">
                                                            {{ reservation.brand }} {{ reservation.model }}
                                                        </div>
                                                    </td>
                                                    <td>{{ moment(reservation.start_date).format("DD-MM-YYYY") }}</td>
                                                    <td>{{ moment(reservation.end_date).format("DD-MM-YYYY") }}</td>
                                                    <td>
                                                        <div class="text-center">{{ reservation.kilometers }} Km</div>
                                                    </td>
                                                    <td class="text-end bg-primary text-warning">
                                                        <div class="text-center">{{ reservation.end_price }}€</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div v-if="!reservations" class="">
                                            <div class="text-center mt-2 h5">
                                                <h5>No reservations were made</h5>
                                                <Link :href="route('cars')"
                                                    class="btn btn-warning text-black p-2 rounded"
                                                    aria-label="Check Available Cars">
                                                Check out our available cars list!
                                                </Link>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </Layout>
</template>

<script>
import Layout from "../../Layout/App.vue";
import { Link } from "@inertiajs/vue3";
import moment from "moment";
import { router } from "@inertiajs/vue3";
import likedCars from "./Profile/likedCars.vue";

export default {
    components: {
        Layout,
        Link,
        likedCars,
    },
    props: {
        user: {
            type: Object,
            required: true,
        },
        reservations: {
            type: Array,
            required: true,
        },
        likedCars: {
            type: Array,
            required: false,
        },
    },
    methods: {
        isCurrentReservation(start_date, end_date) {
            const now = moment();
            const start = moment(start_date);
            const end = moment(end_date);
            const isCurrent = start.isSameOrBefore(now) && end.isSameOrAfter(now);
            return isCurrent;
        },

        isPastReservation(end_date) {
            const now = moment();
            const end = moment(end_date);
            return end.isBefore(now);
        },

        isFutureReservation(start_date) {
            const now = moment();
            const start = moment(start_date);
            return start.isAfter(now);
        }
    },
    data() {
        return {
            moment: moment,
        };
    },
    setup() {
        const destroy = (id) => {
            if (confirm("Are you sure?")) {
                router.delete(route("delete", id));
            }
        };

        return { destroy };
    },
};
</script>

<style scoped></style>
