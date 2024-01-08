@if (session()->has('success'))
    <div id="success-message" class="z-3 position-absolute mt-5 start-50 translate-middle alert alert-success alert-dismissible fade show h4 py-3 px-5" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close px-3 pt-2 pb-4" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
