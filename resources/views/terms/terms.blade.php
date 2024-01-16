@extends('layout.layout')

@section('content')
    @auth
        @if (auth()->user()->is_admin)
            <div class="d-flex justify-content-center mb-4" style="margin-top: 120px">
                <a href="{{ route('terms.create') }}" class="bg-primary nav-link h1 text-primary bg-warning py-3 px-4 rounded"
                    style="font-size: 24px">Create new Term</a>
            </div>
        @endif
    @endauth

    <section class="mb-5" style="margin-top: 140px">
        <div class="container">
            <div class="row">
                @foreach ($terms as $term)
                    <div class="card bg-primary text-light mb-4 img-zoom p-4">
                        <div class="card-body text-center">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h3 class="card-title"> <span
                                        class="rounded-circle border border-warning bg-warning py-2 px-3 text-primary text-center me-1">{{ $loop->index + 1 }}</span>
                                    {{ $term->title }}</h3>
                                @auth
                                    @if (auth()->user()->is_admin)
                                        <div class="mb-2 d-flex justify-content-center">
                                            <form action="{{ route('terms.edit', $term->id) }}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-warning text-primary">Edit</button>
                                            </form>
                                            <form action="{{ route('terms.delete', $term->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-warning text-primary ms-2">Delete</button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                            <p class="card-tex text-light">
                                {{ $term->content }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
