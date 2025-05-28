@extends('layout.template')

@section('content')

<h2 class="mb-4">All Movie</h2>

<div class="row row-cols-1 row-cols-md-2 g-4">
    @foreach ($movies as $movie)
        <div class="col">
            <div class="card h-100 d-flex flex-row">
                <img src="{{ asset('storage/' . $movie->cover_image) }}" class="img-fluid" alt="{{ $movie->title }}" style="max-width: 180px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $movie->title }}</h5>
                    <p class="card-text">{{ Str::limit($movie->synopsis, 150) }}</p>
                    <p class="mb-2">Year: {{ $movie->year }}</p>
                    <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-success btn-sm">Detail</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $movies->links() }}
</div>

@endsection