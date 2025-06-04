@extends('layout.template')
@section('title','list movie')
@section('content')

<h1>list movie</h1>

<table class="table table-bordered">
<tr>
    <th>no</th>
    <th>title</th>
    <th>synopsis</th>
    <th>year</th>
    <th>category</th>
    <th>actors</th>
    <th>aksi</th>
</tr>
@foreach ($movies as $movie)
<tr>
    <td>{{ $movie->id }}</td>
    <td>{{ $movie->title }}</td>
    <td>{{ $movie->synopsis }}</td>
    <td>{{ $movie->year }}</td>
    <td>{{ $movie->category->category_name }}</td>
    <td>{{ $movie->actors }}</td>
    <td>
        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary">Detail</a>
        @if (auth()->user()->role === 'admin')
        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">Edit</a>
         @endif
        <form action="/movies/{{ $movie->id }}" method="POST" class="d-inline">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
          </form>
    </td>
</tr>
    
@endforeach

</table>

<div class="mt-4">
    {{ $movies->links('pagination::bootstrap-5') }}
  </div>
@endsection
