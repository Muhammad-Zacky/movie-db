@extends('layout.template')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center mt-5">
    <div>
        <h2 class="">Login Akun Anda</h2>
    </div>
</div>

<div class="container mt-5">
    <div class="mx-auto d-flex justify-content-center" style="width: 500px;">
        <form class="w-100" action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-orange">Email address</label>
                <input type="email" 
                       class="form-control radius @error('email') is-invalid @enderror" 
                       id="exampleInputEmail1" 
                       aria-describedby="emailHelp" 
                       name="email" 
                       value="{{ old('email') }}"
                       required>
                <div id="emailHelp" class="form-text text-orange">We'll never share your email with anyone else.</div>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-orange">Password</label>
                <input type="password" 
                       class="form-control radius @error('password') is-invalid @enderror" 
                       id="exampleInputPassword1" 
                       name="password"
                       required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input radius" id="exampleCheck1">
                <label class="form-check-label text-orange" for="exampleCheck1">Check me out</label>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
