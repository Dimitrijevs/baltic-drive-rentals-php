@extends('layout.layout')

@section('content')
    <div class="row justify-content-center text-center mx-auto" style="margin-top: 220px; margin-bottom: 260px;">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('login') }}" method="POST">
                @csrf
                <h1>Login</h3>
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
                <div class="d-flex justify-content-end align-items-center my-3">
                    <div class="text-right">
                        <a href="{{ route('register') }}" class="text-dark lead">Register here</a>
                    </div>
                    <div class="form-group ms-3">
                        <input type="submit" name="submit" class="btn btn-primary btn-md h3 text-warning" value="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
