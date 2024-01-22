<section class="p-5">
    <div class="container text-center">
        <h1 class="mb-4">Popular Choices</h1>
        <div class="row justify-content-between">
            @foreach ($cars as $car)
                @include('shared.car-card')
            @endforeach
        </div>
    </div>
</section>
