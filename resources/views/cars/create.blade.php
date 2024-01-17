@extends('layout.layout')

@section('content')
    <div class="row justify-content-center text-center mx-auto" style="margin-top: 140px; margin-bottom: 180px;">
        <div class="col-12 col-sm-8 col-md-6 margin-100">
            <form class="form mt-5" action="{{ route('cars.create') }}" method="POST">
                @csrf
                <h1>Add New Car</h1>
                <div class="form-group mt-3">
                    <label for="name" class="text-dark">Brand Name:</label><br>
                    <input type="text" name="name" id="name" class="form-control border-primary">
                    @error('name')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="phone_number" class="text-dark">Model Name:</label><br>
                    <input type="text" name="phone_number" id="phone_number" class="form-control border-primary">
                    @error('phone_number')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="email" class="text-dark">Year:</label><br>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('email')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="phone_number" class="text-dark">Body Type:</label><br>
                    <input type="text" name="phone_number" id="phone_number" class="form-control border-primary">
                    @error('phone_number')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="phone_number" class="text-dark">Fuel Type:</label><br>
                    <input type="text" name="phone_number" id="phone_number" class="form-control border-primary">
                    @error('phone_number')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="phone_number" class="text-dark">Gearbox:</label><br>
                    <input type="text" name="phone_number" id="phone_number" class="form-control border-primary">
                    @error('phone_number')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="phone_number" class="text-dark">Price per day:</label><br>
                    <input type="text" name="phone_number" id="phone_number" class="form-control border-primary">
                    @error('phone_number')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3" id="photoInputsContainer">
                    <label for="phone_number" class="text-dark">Add Car Photos:</label><br>
                    <input type="file" name="carImage1" class="carImage form-control border-primary">
                    @error('phone_number.0')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                
                <button type="button" class="btn btn-warning text-primary py-2 px-3 mt-2" onclick="addFileInput()">Add More Photos</button>
                                
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
        let amounth = document.querySelectorAll(".carImage").length + 1;
        let input = document.createElement('input');

        if(amounth <= 8){
            input.type = 'file';
            input.name = 'carImage' + amounth;
            input.className = 'carImage form-control border-primary mt-2';
    
            container.appendChild(input);
        } else {
            alert('Max available amounth of images is 8!')
        }


    }
</script>
