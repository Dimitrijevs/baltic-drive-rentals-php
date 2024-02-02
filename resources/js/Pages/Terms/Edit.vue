<template>
    <Layout>
        <div class="container">
            <div class="row" id="section">
                <h2>Updated Term</h2>
                <form @submit.prevent="handleSubmit">
                    <div class="card bg-primary text-light mb-2">
                        <div class="card-body text-center">
                            <input
                                v-model="form.title"
                                type="text"
                                name="title"
                                id="title"
                                class="p-2 mb-3"
                                
                            />
                            <div class="d-block mt-2" v-if="errors.title">
                                <span class="fs-5 text-danger">
                                    {{ errors.title }}
                                </span>
                            </div>
                            <textarea
                                v-model="form.content"
                                name="content"
                                id="content"
                                cols="126"
                                rows="6"
                                
                                ></textarea
                            >
                            <div class="d-block mt-2" v-if="errors.content">
                                <span class="fs-5 text-danger">
                                    {{ errors.content }}
                                </span>
                            </div>
                        </div>
                        <div
                            class="d-flex justify-content-end align-items-center mb-3 me-3"
                        >
                            <div class="form-group">
                                <button
                                    type="submit"
                                    class="btn btn-warning text-primary py-2 px-3"
                                >
                                    Save Term
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <h2 class="mt-5">Former Term</h2>
                <div class="card bg-primary text-light mb-4">
                    <div class="card-body text-center">
                        <div
                            class="mb-2"
                        >
                            <h3 class="card-title">{{ term.title }}</h3>
                        </div>
                        <p class="card-tex text-light">
                            {{ term.content }}
                        </p>
                    </div>
                </div>
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
        term: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        const form = useForm({
            title: props.term.title,
            content: props.term.content,
        });

        const handleSubmit = () => {
            form.submit('put', route('terms.edit', props.term.id));
        };

        return { form, handleSubmit };
    },
};
</script>

<style>
#section {
    margin: 140px auto 60px;
}
</style>
