<template>
    <Layout>
        <div
            id="section"
            class="row justify-content-center text-center mx-auto"
        >
            <div class="col-12 col-sm-8 col-md-6">
                <form @submit.prevent="handleSubmit">
                    <h1>Add New Term</h1>
                    <div class="form-group mt-3">
                        <label for="title" class="text-dark">Title:</label
                        ><br />
                        <input
                            v-model="form.title"
                            type="text"
                            name="title"
                            id="title"
                            class="form-control"
                        />
                        <div v-if="errors.title" class="d-block mt-2">
                            <span class="fs-5 text-danger">
                                {{ errors.title }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="text-dark"
                            >Term Text:</label
                        ><br />
                        <textarea
                            v-model="form.content"
                            name="content"
                            id="content"
                            cols="60"
                            rows="5"
                        ></textarea>
                        <div v-if="errors.content" class="d-block mt-2">
                            <span class="fs-5 text-danger">
                                {{ errors.content }}
                            </span>
                        </div>
                    </div>
                    <div
                        class="form-group ms-3 d-flex justify-content-end mt-3"
                    >
                        <input
                            type="submit"
                            name="submit"
                            class="btn btn-primary btn-md h3 text-warning"
                            value="submit"
                        />
                    </div>
                </form>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "../../Layout/App.vue";
import { useForm } from "@inertiajs/vue3";

export default {
    components: {
        Layout,
    },
    props: {
        errors: Object,
        terms: {
            type: Array,
            required: true,
        },
    },
    setup() {
        const form = useForm({
            title: "",
            content: "",
        });

        const handleSubmit = () => {
            form.submit("post", route("terms.create"));
        };

        return { form, handleSubmit };
    },
};
</script>

<style scoped>
#section {
    margin-top: 220px;
    margin-bottom: 260px;
}
</style>
