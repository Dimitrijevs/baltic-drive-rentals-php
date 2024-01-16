@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row" style="margin: 140px auto 60px">
            <h2>New Term</h2>
            <form action="{{ route('terms.edit', $term->id) }}" method="POST">
                <div class="card bg-primary text-light mb-2">
                    @csrf
                    @method('PUT')
                    <div class="card-body text-center">
                        <input type="text" name="title" id="title" class="p-2 mb-3" value="{{ $term->title }}">
                        @error('title')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                        <textarea name="content" id="content" cols="132" rows="6">{{ $term->content }}</textarea>
                        @error('content')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end align-items-center mb-3 me-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning text-primary py-2 px-3">Save Term</button>
                        </div>
                    </div>
                </div>
            </form>

            <h2 class="mt-5">Old Term</h2>
            <div class="card bg-primary text-light mb-4">
                <div class="card-body text-center">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h3 class="card-title">{{ $term->title }}</h3>
                    </div>
                    <p class="card-tex text-light">
                        {{ $term->content }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
