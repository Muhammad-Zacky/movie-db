@extends('layout') {{-- ganti dengan nama layout kamu jika berbeda --}}

@section('content')
<div class="container">
    <h2>Hasil Pencarian untuk: <em>"{{ $query }}"</em></h2>

    @if($movies->count())
        <div class="row mt-4">
            @foreach($movies as $movie)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($movie->cover_image)
                            <img src="{{ asset('storage/' . $movie->cover_image) }}" class="card-img-top" alt="{{ $movie->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text">{{ Str::limit($movie->synopsis, 100) }}</p>
                            <a href="{{ url('movies/' . $movie->id) }}" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $movies->appends(['query' => $query])->links() }}
        </div>
    @else
        <p class="mt-4">Tidak ada hasil ditemukan untuk kata kunci tersebut.</p>
    @endif
</div>
@endsection
