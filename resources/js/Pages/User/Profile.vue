<template>
    <Layout>
        <div class="profile d-flex mx-auto mb-5">
            <div
                class="profileImg-navBar text-center rounded bg-light me-2 p-5"
            >
                <img :src="user.avatar" alt="" class="rounded-circle z-1" />
                <ul>
                    <li class="m-1">
                        <a
                            :href="route('home')"
                            class="text-secondary h5 text-decoration-none"
                            >Home Page</a
                        >
                    </li>
                    <li class="m-1">
                        <Link
                            :href="route('edit', { user: $page.props.auth })"
                            class="text-secondary h5 text-decoration-none"
                            >Edit Profile</Link
                        >
                    </li>
                    <li class="m-1">
                        <Link
                            :href="route('logout')"
                            class="text-secondary h5 text-decoration-none"
                            >Log Out</Link
                        >
                    </li>
                    <li class="m-1">
                        <button
                            @click="destroy(user.id)"
                            type="submit"
                            class="btn border-none bg-danger h5 py-2 px-3 text-white"
                        >
                            Delete Account
                        </button>
                    </li>
                </ul>
            </div>
            <div class="right-info">
                <div class="about rounded bg-light p-5">
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
                <div
                    class="rent-history rounded bg-light mt-2 p-5 overflow-auto"
                >
                    <h3 class="text-center">Rent History</h3>
                    <ul class="rents list-unstyled">
                        <li class="rent">
                            <p class="m-1">Car Name</p>
                            <p class="m-1">Total Days</p>
                            <p class="m-1">Total KM</p>
                            <p class="rounded py-1 px-2 m-1">Total Price</p>
                        </li>
                        <hr class="m-1" />
                        <li class="rent">
                            <p class="m-1">Car Name</p>
                            <p class="m-1">Total Days</p>
                            <p class="m-1">Total KM</p>
                            <p class="rounded py-1 px-2 m-1">Total Price</p>
                        </li>
                        <hr class="m-1" />
                        <li class="rent">
                            <p class="m-1">Car Name</p>
                            <p class="m-1">Total Days</p>
                            <p class="m-1">Total KM</p>
                            <p class="rounded py-1 px-2 m-1">Total Price</p>
                        </li>
                    </ul>
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

export default {
    components: {
        Layout,
        Link,
    },
    props: {
        user: {
            type: Object,
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
.profile {
    width: 70%;
    margin-top: 100px;
}

.profile .right-info {
    width: 100%;
}

.profile .right-info .rent-history {
    min-height: 400px;
    max-height: 400px;
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
</style>
