<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie DB</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="{{ asset('images/laravel_logo.png') }}" alt="Logo" width="80" height="50" class="me-2">
        <span class="fs-4">Movie</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto">
          <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
          <li class="nav-item"><a class="nav-link active" href="/movies/create">Add Movie</a></li>
        </ul>

      <form class="d-flex me-3" role="search" action="/search" method="GET">
        <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>


        @auth
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link disabled text-white">{{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
              <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin logout?')">
                @csrf
                <button type="submit" class="nav-link btn btn-link text-white" style="text-decoration: none;">
                  Logout
                </button>
              </form>
            </li>
          </ul>
        @else
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
            </li>
          </ul>
        @endauth
      </div>
    </div>
  </nav>

  <main class="container my-4">
    @yield('content')
  </main>

  <footer class="bg-dark text-white text-center py-3 mt-4">
    <small>&copy; {{ date('Y') }} by Muhammad Zacky</small>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
