<template>
    <div class="row justify-content-center text-center mx-auto">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" @submit.prevent="handleSubmit" aria-label="Phone Number Form">
                <div class="form-group mt-3">
                    <label for="phone_number" class="text-dark">Phone Number:</label><br />
                    <input v-model="form.phone_number" type="text" name="phone_number" id="phone_number"
                        class="form-control border-primary" aria-label="Phone Number Input"
                        :aria-invalid="errors.phone_number ? 'true' : 'false'"
                        :aria-describedby="errors.phone_number ? 'phoneNumberError' : null" />
                    <div class="d-block mt-2" v-if="errors.phone_number" id="phoneNumberError">
                        <span class="fs-5 text-danger" aria-live="assertive">{{ errors.phone_number }}</span>
                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-center my-3">
                    <div class="form-group ms-3">
                        <button type="submit" :disabled="form.processing" class="btn btn-warning text-primary py-2 px-3"
                            aria-label="Save Phone Number Button">
                            Save Phone Number
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { Link, useForm } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    props: {
        errors: Object,
        user: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        const form = useForm({
            phone_number: props.user.phone_number
        });

        const handleSubmit = () => {
            form.submit('put', route('update', props.user.id));
        };

        return { form, handleSubmit };
    },
};
</script>

<style></style>
