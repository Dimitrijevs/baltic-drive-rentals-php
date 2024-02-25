<template>
    <Layout>
        <section class="mb-3" id="section">
            <CreateTermModal :errors="$page.props.errors" />

            <div class="container">
                <div class="row">
                    <div
                        class="card bg-primary text-light mb-3 p-4"
                        v-for="(term, index) in terms"
                        :key="term.id"
                    >
                        <div class="card-body text-center">
                            <div
                                class="d-flex align-items-center justify-content-between mb-3"
                            >
                                <h3 class="card-title">
                                    <span
                                        class="rounded-circle border border-warning bg-warning py-2 px-3 text-primary text-center me-1"
                                        >{{ index + 1 }}</span
                                    >
                                    {{ term.title }}
                                </h3>

                                <div
                                    v-if="$page.props.isAdmin"
                                    class="mb-2 d-flex justify-content-center"
                                >
                                    <EditTermModal :term="term" :errors="$page.props.errors" />
                                    <button
                                        @click="destroy(term.id)"
                                        type="submit"
                                        class="btn btn-danger text-primary mb-3 ms-2"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </div>
                            <p class="card-tex text-light">
                                {{ term.content }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </Layout>
</template>

<script>
import Layout from "../../Layout/App.vue";
import { router } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import CreateTermModal from "./Create.vue";
import EditTermModal from "./Edit.vue";

export default {
    components: {
        Layout,
        EditTermModal,
        CreateTermModal,
        Link,
    },
    props: {
        terms: {
            type: Array,
            required: true,
        },
    },
    setup() {
        const destroy = (id) => {
            if (confirm("Are you sure?")) {
                router.delete(route("terms.delete", id));
            }
        };

        return { destroy };
    },
};
</script>

<style scoped>
#section {
    margin-top: 20px;
}
</style>
