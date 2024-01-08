@extends('layout.layout')

@section('content')
    <div class="row justify-content-center text-center mx-auto" style="margin-top: 140px; margin-bottom: 140px;">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('edit', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <h1>Change Your Data</h1>
                <div class="form-group mt-3">
                    <label for="name" class="text-dark">Name:</label><br>
                    <input type="text" name="name" id="name" value="{{ $user->name }}"
                        class="form-control border-primary">
                    @error('name')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex justify-content-end align-items-center my-3">
                    <div class="form-group ms-3">
                        <input type="submit" name="submit" class="btn btn-primary btn-md h3 text-warning"
                            value="Save Name">
                    </div>
                </div>
            </form>

            <form class="form mt-5" action="{{ route('edit', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-3">
                    <label for="phone_number" class="text-dark">Phone Number:</label><br>
                    <input type="text" name="phone_number" id="phone_number" value="{{ $user->phone_number }}"
                        class="form-control border-primary">
                    @error('phone_number')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex justify-content-end align-items-center my-3">
                    <div class="form-group ms-3">
                        <input type="submit" name="submit" class="btn btn-primary btn-md h3 text-warning"
                            value="Save Phone Number">
                    </div>
                </div>
            </form>

            <form class="form mt-5" action="{{ route('edit', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-3">
                    <label for="email" class="text-dark">Email:</label><br>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
                    @error('email')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex justify-content-end align-items-center my-3">
                    <div class="form-group ms-3">
                        <input type="submit" name="submit" class="btn btn-primary btn-md h3 text-warning"
                            value="Save Email">
                    </div>
                </div>
            </form>

            <form enctype="multipart/form-data" class="form mt-5" action="{{ route('edit', $user->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group mt-3">
                    <label for="avatar" class="text-dark">Profile Photo:</label><br>
                    <input type="file" name="avatar" id="avatar" value="{{ $user->avatar }}" class="form-control">
                    @error('avatar')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex justify-content-end align-items-center my-3">
                    <div class="form-group ms-3">
                        <input type="submit" name="submit" class="btn btn-primary btn-md h3 text-warning"
                            value="Save Profile Photo">
                    </div>
                </div>
            </form>

            <form class="form mt-5" action="{{ route('edit', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <h1>Change Password</h1>
                <div class="form-group mt-3">
                    <label for="old_password" class="text-dark">Old Password:</label><br>
                    <input type="password" name="old_password" id="old_password" class="form-control">
                    @error('old_password')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">New Password:</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password_confirmation" class="text-dark">Confirm Password:</label><br>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    @error('password_confirmation')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex justify-content-end align-items-center my-3">
                    <div class="form-group ms-3">
                        <input type="submit" name="submit" class="btn btn-primary btn-md h3 text-warning" value="Save Password">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
