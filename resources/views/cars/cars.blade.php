@extends('layout.layout')

@section('content')
    @auth
        @if (auth()->user()->is_admin)
            <div class="d-flex justify-content-center mb-4" style="margin-top: 120px">
                <a href="{{ route('cars.create') }}" class="bg-primary nav-link h1 text-primary bg-warning py-3 px-4 rounded"
                    style="font-size: 24px">Add New Car</a>
            </div>
        @endif
    @endauth

    <div class="box d-flex mx-auto mb-5" style="margin-top: 120px">
        <div class="left">
            <div class="filter rounded bg-light p-4 me-2">
                <div class="filter-box">
                    <h3>Brand</h3>
                    <div class="one-line">
                        <label for="vwCheckbox"><input type="checkbox" id="vwCheckbox"> VW</label>
                    </div>
                    <div class="one-line">
                        <label for="bmwCheckbox"><input type="checkbox" id="bmwCheckbox"> BMW</label>
                    </div>
                    <div class="one-line">
                        <label for="toyotaCheckbox"><input type="checkbox" id="toyotaCheckbox"> Toyota</label>
                    </div>
                    <div class="one-line">
                        <label for="teslaCheckbox"><input type="checkbox" id="teslaCheckbox"> Tesla</label>
                    </div>
                    <div class="one-line">
                        <label for="audiCheckbox"><input type="checkbox" id="audiCheckbox"> Audi</label>
                    </div>
                    <hr>
                </div>

                <div class="filter-box">
                    <h3>Body Type</h3>
                    <div class="one-line">
                        <label for="hatchbackCheckbox"><input type="checkbox" id="hatchbackCheckbox"> Hatchback</label>
                    </div>
                    <div class="one-line">
                        <label for="suvCheckbox"><input type="checkbox" id="suvCheckbox"> SUV</label>
                    </div>
                    <div class="one-line">
                        <label for="sedanCheckbox"><input type="checkbox" id="sedanCheckbox"> Sedan</label>
                    </div>
                    <div class="one-line">
                        <label for="estateCheckbox"><input type="checkbox" id="estateCheckbox"> Estate</label>
                    </div>
                    <div class="one-line">
                        <label for="cabrioletCheckbox"><input type="checkbox" id="cabrioletCheckbox"> Cabriolet</label>
                    </div>
                    <hr>
                </div>

                <div class="filter-box">
                    <h3>Fuel Type</h3>
                    <div class="one-line">
                        <label for="dieselCheckbox"><input type="checkbox" id="dieselCheckbox"> Diesel</label>
                    </div>
                    <div class="one-line">
                        <label for="petrolCheckbox"><input type="checkbox" id="petrolCheckbox"> Petrol</label>
                    </div>
                    <div class="one-line">
                        <label for="electricCheckbox"><input type="checkbox" id="electricCheckbox"> Electric</label>
                    </div>
                    <div class="one-line">
                        <label for="hybridCheckbox"><input type="checkbox" id="hybridCheckbox"> Hybrid</label>
                    </div>
                    <hr>
                </div>

                <div class="filter-box">
                    <h3>Gearbox</h3>
                    <div class="one-line">
                        <label for="automaticCheckbox"><input type="checkbox" id="automaticCheckbox"> Automatic</label>
                    </div>
                    <div class="one-line">
                        <label for="manualCheckbox"><input type="checkbox" id="manualCheckbox"> Manual</label>
                    </div>
                    <hr>
                </div>

                <div class="filter-box one-select">
                    <h3>Price</h3>
                    <div class="one-line">
                        <label for="upTo20Checkbox"><input type="radio" name="priceRange" id="upTo20Checkbox"> Up to
                            20€</label>
                    </div>
                    <div class="one-line">
                        <label for="upTo30Checkbox"><input type="radio" name="priceRange" id="upTo30Checkbox"> Up to
                            30€</label>
                    </div>
                    <div class="one-line">
                        <label for="upTo50Checkbox"><input type="radio" name="priceRange" id="upTo50Checkbox"> Up to
                            50€</label>
                    </div>
                    <div class="one-line">
                        <label for="upTo70Checkbox"><input type="radio" name="priceRange" id="upTo70Checkbox"> Up to
                            70€</label>
                    </div>
                    <div class="one-line">
                        <label for="upTo100Checkbox"><input type="radio" name="priceRange" id="upTo100Checkbox"> Up to
                            100€</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="right">
            <div class="brands rounded bg-light mb-2 d-flex">
                <img class="img-zoom mx-auto my-3" src="{{ asset('images/logos/audi.png') }}" alt="#">
                <img class="img-zoom mx-auto my-3" src="{{ asset('images/logos/audi.png') }}" alt="#">
                <img class="img-zoom mx-auto my-3" src="{{ asset('images/logos/audi.png') }}" alt="#">
                <img class="img-zoom mx-auto my-3" src="{{ asset('images/logos/audi.png') }}" alt="#">
                <img class="img-zoom mx-auto my-3" src="{{ asset('images/logos/audi.png') }}" alt="#">
            </div>

            <section class="bg-light mt-2 rounded">
                <div class="p-5">
                    <div class="container text-center">
                        <div class="row justify-content-between">
                            <div class="card col-3 p-0 m-3 bg-primary text-light border-primary">
                                <img src="{{ url('/images/camry.jpg') }}" class="card-img-top img-fluid" alt="">
                                <div class="card-body">
                                    <h3 class="card-title">Car title</h4>
                                        <p class="text-white">Price: Car price</p>
                                        <a class="btn btn-warning mb-1 img-zoom text-white" href="{{ route('home') }}"><i
                                                class="bi bi-chevron-right"></i> Read More</a>
                                </div>
                            </div>

                            <div class="card col-3 p-0 m-3 bg-primary text-light border-primary">
                                <img src="{{ url('/images/camry.jpg') }}" class="card-img-top img-fluid" alt="">
                                <div class="card-body">
                                    <h3 class="card-title">Car title</h4>
                                        <p class="text-white">Price: Car price</p>
                                        <a class="btn btn-warning mb-1 img-zoom text-white" href="{{ route('home') }}"><i
                                                class="bi bi-chevron-right"></i> Read More</a>
                                </div>
                            </div>

                            <div class="card col-3 p-0 m-3 bg-primary text-light border-primary">
                                <img src="{{ url('/images/camry.jpg') }}" class="card-img-top img-fluid" alt="">
                                <div class="card-body">
                                    <h3 class="card-title">Car title</h4>
                                        <p class="text-white">Price: Car price</p>
                                        <a class="btn btn-warning mb-1 img-zoom text-white" href="{{ route('home') }}"><i
                                                class="bi bi-chevron-right"></i> Read More</a>
                                </div>
                            </div>

                            <div class="card col-3 p-0 m-3 bg-primary text-light border-primary">
                                <img src="{{ url('/images/camry.jpg') }}" class="card-img-top img-fluid" alt="">
                                <div class="card-body">
                                    <h3 class="card-title">Car title</h4>
                                        <p class="text-white">Price: Car price</p>
                                        <a class="btn btn-warning mb-1 img-zoom text-white" href="{{ route('home') }}"><i
                                                class="bi bi-chevron-right"></i> Read More</a>
                                </div>
                            </div>

                            <div class="card col-3 p-0 m-3 bg-primary text-light border-primary">
                                <img src="{{ url('/images/camry.jpg') }}" class="card-img-top img-fluid" alt="">
                                <div class="card-body">
                                    <h3 class="card-title">Car title</h4>
                                        <p class="text-white">Price: Car price</p>
                                        <a class="btn btn-warning mb-1 img-zoom text-white" href="{{ route('home') }}"><i
                                                class="bi bi-chevron-right"></i> Read More</a>
                                </div>
                            </div>

                            <div class="card col-3 p-0 m-3 bg-primary text-light border-primary">
                                <img src="{{ url('/images/camry.jpg') }}" class="card-img-top img-fluid" alt="">
                                <div class="card-body">
                                    <h3 class="card-title">Car title</h4>
                                        <p class="text-white">Price: Car price</p>
                                        <a class="btn btn-warning mb-1 img-zoom text-white" href="{{ route('home') }}"><i
                                                class="bi bi-chevron-right"></i> Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@section('content')
