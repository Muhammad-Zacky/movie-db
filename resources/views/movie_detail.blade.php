@extends('layout.template')

@section('content')
<h2 class="mb-4">Detail Movie</h2>

<div class="card mb-4">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $movie->cover_image) }}" class="img-fluid rounded-start" alt="{{ $movie->title }}" style="object-fit: cover; width: 100%; height: 100%;">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h3 class="card-title">{{ $movie->title }}</h3>
                <p class="card-text">{{ $movie->synopsis }}</p>

                {{-- Actors setelah synopsis, tanpa bold --}}
                <p class="card-text text-muted">
                    Actors: {{ $movie->actors ? implode(', ', array_map('trim', explode(',', $movie->actors))) : 'Tidak ada data aktor.' }}
                </p>

                <p class="text-muted">Year: {{ $movie->year }}</p>
                
                {{-- Category --}}
                <p class="card-text">
                    <small class="text-muted">
                        Category: {{ optional($movie->category)->category_name ?? 'Tidak ada kategori' }}
                    </small>
                </p>

                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection