@extends('layout.layout')

@section('content')
    <div class="row justify-content-center text-center mx-auto" style="margin-top: 140px; margin-bottom: 180px;">
        <div class="col-12 col-sm-8 col-md-6 margin-100">
            <form enctype="multipart/form-data" class="form mt-5" action="{{ route('cars.create') }}" method="POST">
                @csrf
                <h1>Add New Car</h1>
                <div class="form-group mt-3">
                    <label for="brand" class="text-dark">Brand Name:</label><br>
                    <input type="text" name="brand" id="brand" class="form-control border-primary">
                    @error('brand')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="model" class="text-dark">Model Name:</label><br>
                    <input type="text" name="model" id="model" class="form-control border-primary">
                    @error('model')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="year" class="text-dark">Year:</label><br>
                    <input type="number" name="year" id="year" class="form-control">
                    @error('year')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="body_type" class="text-dark">Body Type:</label><br>
                    <input type="text" name="body_type" id="body_type" class="form-control border-primary">
                    @error('body_type')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="fuel_type" class="text-dark">Fuel Type:</label><br>
                    <input type="text" name="fuel_type" id="fuel_type" class="form-control border-primary">
                    @error('fuel_type')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="emissions" class="text-dark">CO2 Emissions:</label><br>
                    <input type="number" name="emissions" id="emissions" class="form-control border-primary">
                    @error('emissions')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="gearbox" class="text-dark">Gearbox:</label><br>
                    <input type="text" name="gearbox" id="gearbox" class="form-control border-primary">
                    @error('gearbox')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="price_per_day" class="text-dark">Price per day:</label><br>
                    <input type="number" name="price_per_day" id="price_per_day" class="form-control border-primary">
                    @error('price_per_day')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="price_per_km" class="text-dark">Price per Km:</label><br>
                    <input type="number" step="0.01" name="price_per_km" id="price_per_km" class="form-control border-primary">
                    @error('price_per_km')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div id="photoInputsContainer">
                    <div class="form-group mt-3">
                        <label for="carImage1" class="text-dark">Add 1. Car Photo:</label><br>
                        <input type="file" name="carImage1" class="carImage form-control border-primary">
                        @error('carImage1')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button type="button" class="btn btn-warning text-primary py-2 px-3 mt-2" onclick="addFileInput()">Add More
                    Photos</button>

                <div class="d-flex justify-content-end align-items-center my-3">
                    <div class="form-group ms-3">
                        <button type="submit" class="btn btn-warning text-primary py-2 px-3">Add New Car!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    function addFileInput() {
        let container = document.getElementById('photoInputsContainer');
        let amount = document.querySelectorAll(".carImage").length + 1;

        if (amount <= 8) {
            let newDiv = document.createElement('div');
            newDiv.className = 'form-group mt-3';

            let label = document.createElement('label');
            label.htmlFor = 'carImage' + amount;
            label.className = "text-dark";
            label.textContent = `Add ${amount}. Car Photo:`;

            let input = document.createElement('input');
            input.type = 'file';
            input.name = 'carImage' + amount;
            input.id = 'carImage' + amount;
            input.className = 'carImage form-control border-primary mt-2';

            newDiv.appendChild(label);
            newDiv.appendChild(input);
            container.appendChild(newDiv);
        } else {
            alert('Max available amount of images is 8!')
        }
    }
</script>
