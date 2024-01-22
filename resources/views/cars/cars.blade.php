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
            <form action="">
                <div class="filter rounded bg-light p-4 me-2">
                    <div class="filter-box">
                        <h4>Brand</h4>
                        <div class="one-line">
                            <label for="audiCheckbox"><input type="checkbox" id="audiCheckbox" name="brands[]" value="Audi">
                                Audi</label>
                        </div>
                        <div class="one-line">
                            <label for="bmwCheckbox"><input type="checkbox" id="bmwCheckbox" name="brands[]" value="BMW">
                                BMW</label>
                        </div>
                        <div class="one-line">
                            <label for="mazdaCheckbox"><input type="checkbox" id="mazdaCheckbox" name="brands[]" value="Mazda">
                                Mazda</label>
                        </div>
                        <div class="one-line">
                            <label for="skodaCheckbox"><input type="checkbox" id="skodaCheckbox" name="brands[]" value="Skoda">
                                Skoda</label>
                        </div>
                        <div class="one-line">
                            <label for="teslaCheckbox"><input type="checkbox" id="teslaCheckbox" name="brands[]" value="Tesla">
                                Tesla</label>
                        </div>
                        <div class="one-line">
                            <label for="toyotaCheckbox"><input type="checkbox" id="toyotaCheckbox" name="brands[]"
                                    value="Toyota"> Toyota</label>
                        </div>
                        <div class="one-line">
                            <label for="vwCheckbox"><input type="checkbox" id="vwCheckbox" name="brands[]" value="Volkswagen">
                                VW</label>
                        </div>
                        <hr>
                    </div>
    
                    <div class="filter-box">
                        <h4>Body Type</h4>
                        <div class="one-line">
                            <label for="cabrioletCheckbox"><input type="checkbox" id="cabrioletCheckbox" name="body_types[]"
                                    value="Cabriolet"> Cabriolet</label>
                        </div>
                        <div class="one-line">
                            <label for="estateCheckbox"><input type="checkbox" id="estateCheckbox" name="body_types[]"
                                    value="Estate"> Estate</label>
                        </div>
                        <div class="one-line">
                            <label for="hatchbackCheckbox"><input type="checkbox" id="hatchbackCheckbox" name="body_types[]"
                                    value="Hatchback"> Hatchback</label>
                        </div>
                        <div class="one-line">
                            <label for="sedanCheckbox"><input type="checkbox" id="sedanCheckbox" name="body_types[]"
                                    value="Sedan"> Sedan</label>
                        </div>
                        <div class="one-line">
                            <label for="suvCheckbox"><input type="checkbox" id="suvCheckbox" name="body_types[]"
                                    value="Crossover"> Crossover</label>
                        </div>
                        <hr>
                    </div>
    
                    <div class="filter-box">
                        <h4>Fuel Type</h4>
                        <div class="one-line">
                            <label for="dieselCheckbox"><input type="checkbox" id="dieselCheckbox"> Diesel</label>
                        </div>
                        <div class="one-line">
                            <label for="electricCheckbox"><input type="checkbox" id="electricCheckbox"> Electric</label>
                        </div>
                        <div class="one-line">
                            <label for="hybridCheckbox"><input type="checkbox" id="hybridCheckbox"> Hybrid (Petrol +
                                Electric)</label>
                        </div>
                        <div class="one-line">
                            <label for="petrolCheckbox"><input type="checkbox" id="petrolCheckbox"> Petrol</label>
                        </div>
                        <hr>
                    </div>
    
                    <div class="filter-box">
                        <h4>Gearbox</h4>
                        <div class="one-line">
                            <label for="automaticCheckbox"><input type="checkbox" id="automaticCheckbox"> Automatic</label>
                        </div>
                        <div class="one-line">
                            <label for="manualCheckbox"><input type="checkbox" id="manualCheckbox"> Manual</label>
                        </div>
                        <hr>
                    </div>
    
                    <div class="filter-box one-select">
                        <h4>Price</h4>
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
                <button type="submit" class="btn btn-warning text-primary py-2 px-3">Apply</button>
            </form>
        </div>

        <div class="right">
            <div class="brands rounded bg-light mb-2 d-flex">
                <img class="img-zoom mx-auto my-3" name="brands[]" value="Audi" src="{{ asset('images/logos/audi.png') }}" alt="#">
                <img class="img-zoom mx-auto my-3" src="{{ asset('images/logos/bmw.png') }}" alt="#">
                <img class="img-zoom mx-auto my-3" src="{{ asset('images/logos/tesla.png') }}" alt="#">
                <img class="img-zoom mx-auto my-3" src="{{ asset('images/logos/toyota.png') }}" alt="#">
                <img class="img-zoom mx-auto my-3" src="{{ asset('images/logos/vw.png') }}" alt="#">
            </div>

            <section class="bg-light mt-2 rounded">
                <div class="p-5">
                    <div class="container text-center">
                        <div class="row justify-content-between">
                            @forelse($cars as $car)
                                @include('shared.car-card')
                            @empty
                                <p>No available cars</p>
                            @endforelse
                            {{ $cars->links() }}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @section('content')
