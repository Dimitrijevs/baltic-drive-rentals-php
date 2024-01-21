@extends('layout.layout')

@section('content')
    <section class="p-4 bg-primary">
        <div class="container">
            <h1 class="text-center mb-4 text-warning" style="margin-top: 60px">{{ $car->brand }} {{ $car->model }}</h1>
            <div class="px-5 mb-2">
                <div class="container" style="min-height: 600px;">
                    <div class="d-flex">
                        <div class="me-5" style="min-width: 280px">
                            <ul class="list-unstyled">
                                <li class="bg-light py-2 px-4 d-flex my-3">
                                    <p class="mb-0 me-2 fw-bold">Name:</p>
                                    <span class="">{{ $car->brand }} {{ $car->model }}</span>
                                </li>
                                <li class="bg-light py-2 px-4 d-flex my-3">
                                    <p class="mb-0 me-2 fw-bold">Year:</p>
                                    <span class="">{{ $car->year }}.</span>
                                </li>
                                <li class="bg-light py-2 px-4 d-flex my-3">
                                    <p class="mb-0 me-2 fw-bold">Body Type:</p>
                                    <span class="">{{ $car->body_type }}</span>
                                </li>
                                <li class="bg-light py-2 px-4 d-flex my-3">
                                    <p class="mb-0 me-2 fw-bold">Gearbox:</p>
                                    <span class="">{{ $car->gearbox }}</span>
                                </li>
                                <li class="bg-light py-2 px-4 d-flex my-3">
                                    <p class="mb-0 me-2 fw-bold">Fuel Type:</p>
                                    <span class="">{{ $car->fuel_type }}</span>
                                </li>
                                <li class="bg-light py-2 px-4 d-flex my-3">
                                    <p class="mb-0 me-2 fw-bold">Horsepowers:</p>
                                    <span class="">{{ $car->horsepower }}Hp</span>
                                </li>
                                <li class="bg-light py-2 px-4 d-flex my-3">
                                    <p class="mb-0 me-2 fw-bold">CO2 Emissions:</p>
                                    <span class="">{{ $car->emissions }}g/km</span>
                                </li>
                                <li class="bg-light py-2 px-4 d-flex my-3">
                                    <p class="mb-0 me-2 fw-bold">Price Per Day:</p>
                                    <span class="">{{ $car->price_per_day }}€</span>
                                </li>
                                <li class="bg-light py-2 px-4 d-flex my-3">
                                    <p class="mb-0 me-2 fw-bold">Price Per Km:</p>
                                    <span class="">{{ $car->price_per_km }}€</span>
                                </li>
                            </ul>
                        </div>

                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ $car->getFirstImageURL() }}" class="d-block w-100" alt="...">
                                </div>
                                @foreach ($car->getImageURLs() as $image)
                                    <div class="carousel-item">
                                        <img src="{{ $image }}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Not working --}}
        <form action="">
            <div class="container mt-5">
                <div class="row text-center">
                    <div class="col-md-4 mb-3">
                        <label class="text-white mb-2" for="tripDuration">How long is your trip going to be?</label>
                        <input class="form-control form-control-md input-small mx-auto" type="number" id="tripDuration" placeholder="1-365">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="text-white mb-2" for="kilometers">How many kilometers?</label>
                        <input class="form-control form-control-md input-small mx-auto" type="number" id="kilometers" placeholder="KM">
                    </div>

                    <div class="col-md-4">
                        <p class="text-white mb-2" for="totalPrice">Total Price:</p>
                        <h4 class="text-warning" value="1234"></h4>
                    </div>
                </div>
            </div>

            <div class="my-4 text-center img-zoom">
                <button type="submit" class="btn btn-warning text-primary py-3 px-4">Rent Your Car!</button>
            </div>
        </form>
    </section>

    @include('home.contact-us')
@endsection
