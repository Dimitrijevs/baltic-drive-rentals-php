@extends('layout.layout')

@section('content')
    <div class="profile d-flex mx-auto mb-5">
        <div class="profileImg-navBar text-center rounded bg-light me-2 p-5">
            <img src="{{ $user->getImageURL() }}" alt="" class="rounded-circle z-1">
            <ul>
                <li class="m-1"><a href="{{ route('home') }}" class="text-secondary h5 text-decoration-none">Home Page</a>
                </li>
                <li class="m-1"><a href="{{ route('edit', $user->id) }}"
                        class="text-secondary h5 text-decoration-none">Edit
                        Profile</a></li>
                <li class="m-1"><a href="{{ route('logout') }}" class="text-secondary h5 text-decoration-none">Log
                        Out</a></li>
                <li class="m-1">
                    <form action="{{ route('delete', $user->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn border-none bg-danger h5 py-2 px-3 text-white">Delete
                            Account
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="right-info">
            <div class="about rounded bg-light p-5">
                <h3 class="text-center">About You</h3>
                <ul class="list-group list-group-flush lead">
                    <li>
                        <p class="fw-bold m-0">Name</p>
                        <span>{{ $user->name }}</span>
                    </li>
                    <hr class="m-1">
                    <li>
                        <p class="fw-bold m-0">Email</p>
                        <span>{{ $user->email }}</span>
                    </li>
                    <hr class="m-1">
                    <li>
                        <p class="fw-bold m-0">Phone</p>
                        <span>{{ $user->phone_number }}</span>
                    </li>
                    <hr class="m-1">
                    <li>
                        <p class="fw-bold m-0">Accout Created At</p>
                        <span>{{ $user->created_at->format('d.m.Y') }}</span>
                    </li>
                </ul>
            </div>
            <div class="rent-history rounded bg-light mt-2 p-5 overflow-auto">
                <h3 class="text-center">Rent History</h3>
                <ul class="rents list-unstyled">
                    <li class="rent">
                        <p class="m-1">Car Name</p>
                        <p class="m-1">Total Days</p>
                        <p class="m-1">Total KM</p>
                        <p class="rounded py-1 px-2 m-1">Total Price</p>
                    </li>
                    <hr class="m-1">
                    <li class="rent">
                        <p class="m-1">Car Name</p>
                        <p class="m-1">Total Days</p>
                        <p class="m-1">Total KM</p>
                        <p class="rounded py-1 px-2 m-1">Total Price</p>
                    </li>
                    <hr class="m-1">
                    <li class="rent">
                        <p class="m-1">Car Name</p>
                        <p class="m-1">Total Days</p>
                        <p class="m-1">Total KM</p>
                        <p class="rounded py-1 px-2 m-1">Total Price</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
