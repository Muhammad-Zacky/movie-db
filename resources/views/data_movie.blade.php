
@extends('layout.template')

@section('title', 'Data Movie')

@section('content')
    <h1>Daftar Movie</h1>

    <table class="table table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Cover</th>
                <th>Title</th>
                <th>Category</th>
                <th style="width: 150px;">Actors</th> <!-- Kolom actors dibuat kecil -->
                <th>Year</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($movies as $index => $movie)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($movie->cover_image)
                            <img src="{{ asset($movie->cover_image) }}" alt="{{ $movie->title }}" style="width: 60px; height: 30%; object-fit: cover;">
                        @else
                            <span>-</span>
                        @endif
                    </td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->category->category_name ?? '-' }}</td>
                    <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        {{ $movie->actors }}
                    </td>
                    <td>{{ $movie->year }}</td>
                    <td>




                        @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        @endif


                            @can('delete-movie')
                             <form action="{{ url('/movie/' . $movie->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                            @endcan

                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data movie.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $movies->links() }}
    </div>
@endsection
