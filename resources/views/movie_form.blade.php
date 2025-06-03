@extends('layout.template')

@section('content')
<div class="container">

    {{-- Tampilkan pesan sukses jika ada --}}
    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <h2>Tambah Film Baru</h2>

    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <a href="/list" class="btn btn-primary mb-3">Data Movie</a>
      <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>

      <div class="mb-3">
        <label for="synopsis" class="form-label">Sinopsis</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="synopsis" rows="3"></textarea>
      </div>

      <div class="mb-3">
        <label for="category_id" class="form-label">Kategori</label>
        <select class="form-select" name="category_id">
          <option value="" selected disabled>Pilih Kategori</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="year" class="form-label">Tahun</label>
        <select name="year" class="form-select" required>
          <option value="" selected disabled>Pilih Tahun</option>
          @for ($i = date('Y'); $i >= 1900; $i--)
            <option value="{{ $i }}">{{ $i }}</option>
          @endfor
        </select>
      </div>

      <div class="mb-3">
        <label for="actors" class="form-label">Aktor</label>
        <input type="text" class="form-control" id="actors" name="actors">
      </div>

      <div class="mb-3">
        <label for="cover_image" class="form-label">Gambar</label>
        <div class="input-group mb-3">
          <input type="file" class="form-control" id="inputGroupFile02" name="cover_image" accept="image/*">
          <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection
