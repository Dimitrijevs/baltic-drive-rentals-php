@extends('layout.layout')

@section('content')
    <div class="row justify-content-center text-center mx-auto" style="margin-top: 140px; margin-bottom: 180px;">
        <div class="col-12 col-sm-8 col-md-6 margin-100">
            <form class="form mt-5" action="{{ route('register') }}" method="POST">
                @csrf
                <h1>Register</h1>
                <div class="form-group mt-3">
                    <label for="name" class="text-dark">Name:</label><br>
                    <input type="text" name="name" id="name" class="form-control border-primary">
                    @error('name')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="phone_number" class="text-dark">Phone Number:</label><br>
                    <input type="text" name="phone_number" id="phone_number" class="form-control border-primary">
                    @error('phone_number')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="email" class="text-dark">Email:</label><br>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('email')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Password:</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="confirm-password" class="text-dark">Confirm Password:</label><br>
                    <input type="password" name="password_confirmation" class="form-control">
                    @error('password_confirmation')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex justify-content-end align-items-center my-3">
                    <div class="text-right">
                        <a href="{{ route('login') }}" class="text-dark lead">Login here</a>
                    </div>
                    <div class="form-group ms-3">
                        <button type="submit" class="btn btn-warning text-primary py-2 px-3">Register!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
