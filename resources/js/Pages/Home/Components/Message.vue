<template>
    <div
        v-if="$page.props.flash.message"
        id="message"
        class="z-2 position-absolute mt-5 start-50 translate-middle alert alert-success alert-dismissible fade show h4 py-3 px-5"
    >
        {{ $page.props.flash.message }}
        <button
            type="button"
            class="btn-close px-3 pt-2 pb-4"
            data-bs-dismiss="alert"
            aria-label="Close"
        ></button>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
