<template>
    <Layout>
        <div class="profile d-flex mx-auto mb-5">
            <div class="profileImg-navBar text-center rounded bg-light me-2 p-3">
                <img id="avatar" :src="user.avatar" alt="" class="rounded-circle z-1" />
                <ul class="list-unstyled">
                    <li class="mb-1 mt-0">
                        <Link :href="route('edit', { user: $page.props.auth })" class="btn btn-primary d-block py-2">
                        <i class="bi bi-person-lines-fill me-2"></i> Edit Profile
                        </Link>
                    </li>
                    <li class="mb-1 mt-0">
                        <Link :href="route('logout')" class="btn btn-primary d-block py-2">
                        <i class="bi bi-box-arrow-right me-2"></i> Log Out
                        </Link>
                    </li>
                    <li class="mb-1 mt-0">
                        <likedCars :likedCars="likedCars"/>
                    </li>
                    <li class="mb-1 mt-0">
                        <button @click="destroy(user.id)" type="submit" class="btn btn-danger d-block py-2 width-216">
                            <i class="bi bi-trash-fill me-2"></i> Delete Account
                        </button>
                    </li>
                </ul>
            </div>
            <div class="right-info">
                <div class="about rounded bg-light p-3">
                    <h3 class="text-center">About You</h3>
                    <ul class="list-group list-group-flush lead">
                        <li>
                            <p class="fw-bold m-0">Name</p>
                            <span>{{ user.name }}</span>
                        </li>
                        <hr class="m-1" />
                        <li>
                            <p class="fw-bold m-0">Email</p>
                            <span>{{ user.email }}</span>
                        </li>
                        <hr class="m-1" />
                        <li>
                            <p class="fw-bold m-0">Phone</p>
                            <span>{{ user.phone_number }}</span>
                        </li>
                        <hr class="m-1" />
                        <li>
                            <p class="fw-bold m-0">Accout Created At</p>
                            <span>{{
                                moment(user.created_at).format("DD-MM-YYYY")
                            }}</span>
                        </li>
                    </ul>
                </div>
                <div class="rent-history rounded bg-light mt-2 p-3 overflow-auto">
                    <h3 class="text-center">Rent History</h3>
                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Car</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">
                                    <div class="text-center">
                                        Driven distance (Km)
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="text-center">
                                        Total price (€)
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(reservation, index) in reservations" :key="index">
                                <td>{{ cars[index].brand }} {{ cars[index].model }}</td>
                                <td>{{ moment(reservation.start_date).format("DD-MM-YYYY") }}</td>
                                <td>{{ moment(reservation.end_date).format("DD-MM-YYYY") }}</td>
                                <td>
                                    <div class="text-center">
                                        {{ reservation.kilometers }} Km
                                    </div>
                                </td>
                                <td class="text-end bg-primary text-warning">
                                    <div class="text-center">
                                        {{ reservation.end_price }}€
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
        cars: {
            type: Array,
            required: true,
        },
        likedCars: {
            type: Array,
            required: true,
        },
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

<style scoped>
#avatar {
    max-height: 240px;
}

.profile {
    width: 60%;
    margin-top: 20px;
}

.profile .right-info {
    width: 100%;
}

.profile .right-info .rent-history {
    height: 420px;
}

.profile .right-info .rent-history .rents .rent p:nth-child(4) {
    background-color: var(--black);
    color: var(--skin);
}

.profile .profileImg-navBar ul,
.profile .right-info .about ul,
.profile .right-info .rent-history ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

.profile .profileImg-navBar ul {
    margin-top: 80%;
}

.profile .profileImg-navBar ul li {
    margin: 12px;
}

.profile .profileImg-navBar ul li a {
    position: relative;
    text-decoration-color: var(--white-white);
}

.profile .profileImg-navBar img {
    width: 240px;
}

.profile .right-info .about ul li,
.profile .right-info .rent-history ul li {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
}

.width-216 {
    width: 216px;
}

</style>
