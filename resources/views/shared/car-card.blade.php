<div class="card col-3 p-0 m-3 bg-primary text-light border-primary">
    <img src="{{ $car->getFirstImageURL() }}" class="card-img-top img-fluid" alt="">
    <div class="card-body">
        <h3 class="card-title">{{ $car->brand }} {{ $car->model }}</h4>
            <p class="text-white mb-0">Price Per Day: {{ $car->price_per_day }}€</p>
            <p class="text-white">Price Per Km: {{ $car->price_per_km }}€</p>
            <a class="btn btn-warning mb-1 img-zoom text-primary"
                href="{{ route('car.show', $car->id) }}"><i class="bi bi-chevron-right"></i>Read More</a>
    </div>
</div>