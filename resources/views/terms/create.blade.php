@extends('layout.layout')

@section('content')
    <div class="row justify-content-center text-center mx-auto" style="margin-top: 220px; margin-bottom: 260px;">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('terms.create') }}" method="POST">
                @csrf
                <h1>Add Term</h1>
                <div class="form-group mt-3">
                    <label for="title" class="text-dark">Title:</label><br>
                    <input type="text" name="title" id="title" class="form-control">
                    @error('email')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Term Text:</label><br>
                    <textarea name="content" id="content" cols="60" rows="5"></textarea>
                    @error('password')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group ms-3 d-flex justify-content-end mt-3">
                    <input type="submit" name="submit" class="btn btn-primary btn-md h3 text-warning" value="submit">
                </div>
            </form>
        </div>
    </div>
@endsection
