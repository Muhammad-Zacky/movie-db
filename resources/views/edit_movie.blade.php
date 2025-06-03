@extends('layout.template')
@section('title','Edit Movie')
@section('content')

<h1>Edit Movie</h1>

<form action="/movies/{{ $movies->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- Judul --}}
    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" name="title" 
               value="{{ old('title', $movies->title) }}" required>
    </div>

    {{-- Sinopsis --}}
    <div class="mb-3">
        <label for="synopsis" class="form-label">Sinopsis</label>
        <textarea class="form-control" id="synopsis" name="synopsis" rows="4" required>{{ old('synopsis', $movies->synopsis) }}</textarea>
    </div>

    {{-- Kategori --}}
    <div class="mb-3">
        <label for="category" class="form-label">Kategori</label>
        <select class="form-select" id="category" name="category_id" required>
            <option value="">Pilih Kategori</option>
            <option value="1" {{ old('category_id', $movies->category_id) == 1 ? 'selected' : '' }}>Action</option>
            <option value="2" {{ old('category_id', $movies->category_id) == 2 ? 'selected' : '' }}>Drama</option>
            <option value="3" {{ old('category_id', $movies->category_id) == 3 ? 'selected' : '' }}>Romance</option>
            <option value="4" {{ old('category_id', $movies->category_id) == 4 ? 'selected' : '' }}>Horror</option>
            <option value="5" {{ old('category_id', $movies->category_id) == 5 ? 'selected' : '' }}>Thriller</option>
        </select>
    </div>

    {{-- Tahun --}}
    <div class="mb-3">
        <label for="year" class="form-label">Tahun</label>
        <select class="form-select" id="year" name="year" required>
            <option value="">Pilih Tahun</option>
            @for ($i = date('Y'); $i >= 1900; $i--)
                <option value="{{ $i }}" {{ old('year', $movies->year) == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
    </div>

    {{-- Aktor --}}
    <div class="mb-3">
        <label for="actor" class="form-label">Aktor</label>
        <input type="text" class="form-control" id="actor" name="actors" value="{{ old('actors', $movies->actors) }}">
    </div>

    {{-- Gambar --}}
    <div class="mb-3">
        <label for="cover_image" class="form-label">Gambar</label>
        <div class="input-group">
            <input type="file" class="form-control" id="cover_image" name="cover_image">
            <button class="btn btn-outline-secondary" type="button" disabled>Upload</button>
        </div>
    </div>

    {{-- Tombol Submit --}}
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
