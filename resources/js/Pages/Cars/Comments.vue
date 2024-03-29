<template>
    <Link v-if="!$page.props.auth" :href="route('login')">
    <button type="button" class="btn btn-light border-none px-3 py-2 ms-2 btn-48">
        <i class="bi bi-chat-left-text text-primary h4"></i>
    </button>
    </Link>

    <!-- Button trigger modal -->
    <button v-if="$page.props.auth" type="button" class="btn btn-light border-none px-3 py-2 ms-2 btn-48"
        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <i class="bi bi-chat-left-text text-primary h4"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div id="commentModal" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Comments section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="handleSubmit">
                        <h6>Write a comment</h6>
                        <div class="form-group d-flex">
                            <img :src="profilePhoto" alt="" class="rounded-circle profile-photo me-2">
                            <div class=""></div>
                            <input v-model="form.comment" type="text" name="comment" id="comment"
                                class="border-0 border-bottom flex-grow-1">
                            <button type="submit" :disabled="form.processing"
                                class="btn btn-warning text-primary ms-1 px-3 py-2 ms-3">Save</button>
                        </div>
                        <div class="d-block mt-2 text-center" v-if="errors.comment">
                            <span class="fs-5 text-danger">
                                {{ errors.comment }}
                            </span>
                        </div>
                    </form>
                    <hr>
                    <div class="text-center" v-if="!comments.length">Comments will be displayed here</div>
                    <div class="" v-for="comment in comments" :key="comment.id">
                        <div class="d-flex">
                            <img :src="comment.profilePhoto" alt="" class="rounded-circle profile-photo me-2">
                            <div class="mb-3 w-100">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 text-secondary">{{ comment.name }}</h6>
                                    <div class="d-flex">
                                        <button v-if="$page.props.auth.id === comment.user_id" type="button"
                                            class="btn btn-warning text-primary me-1 px-2 py-1"
                                            @click="editComment(comment)">
                                            <i class="bi bi-pencil-square h5 ms-1"></i>
                                        </button>
                                        <button v-if="$page.props.auth.id === comment.user_id"
                                            @click="destroy(comment.id, comment.car_id)" type="submit"
                                            class="btn btn-danger text-primary px-2 py-1">
                                            <i class="bi bi-trash h5 ms-1"></i>
                                        </button>
                                    </div>
                                </div>
                                <div v-if="comment.editing" class="">
                                    <form
                                        @submit.prevent="handleEditSubmit(comment.comment, comment.car_id, comment.id)">
                                        <div class="form-group d-flex mt-1">
                                            <input class="w-100" type="text" v-model="comment.comment">
                                            <button type="submit" :disabled="form.processing"
                                                class="btn btn-warning text-primary ms-1 px-2 py-1 ms-2">Save</button>
                                        </div>
                                    </form>
                                </div>
                                <p v-if="!comment.editing" class="mb-1 text-primary text-wrap">{{ comment.comment }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary text-white px-3 py-2"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Link, useForm } from "@inertiajs/vue3";
import { ref, onMounted } from 'vue';
import { router } from "@inertiajs/vue3";

export default {
    components: {
        Link
    },
    props: {
        errors: Object,
        profilePhoto: {
            type: Image,
            required: true,
        },
        carId: {
            type: Number,
            required: true,
        },
        comments: {
            type: Array
        },
    },
    setup(props) {
        const form = useForm({
            comment: "",
            car_id: props.carId,
        });

        const formEdit = useForm({
            comment: "",
            comment_id: "",
            car_id: props.carId,
        });

        let bsModal = null;

        onMounted(() => {
            bsModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
        });

        const handleSubmit = () => {
            form.submit("post", route("comment", { car: props.carId }))
            bsModal.hide();
            form.comment = "";
        };

        const handleEditSubmit = (comment_text, car_id, comment_id) => {
            formEdit.comment = comment_text;
            formEdit.comment_id = comment_id;
            router.put(route("comment.update", { car: car_id, comment: comment_id }), formEdit, {
                onSuccess: () => {
                    comment.editing = false;
                }
            });
        };

        const editComment = (comment) => {
            comment.editing = !comment.editing;
        };

        const destroy = (comment_id, car_id) => {
            if (confirm("Are you sure?")) {
                router.delete(route("comment.delete", { car: car_id, comment: comment_id, car_id, comment_id }));
            }
        };

        return { form, handleSubmit, destroy, editComment, handleEditSubmit };
    },
}
</script>

<style scoped>
.btn-48 {
    height: 48px;
}

.profile-photo {
    width: 48px;
    height: 48px;
}
</style>
