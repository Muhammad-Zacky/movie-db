<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [MovieController::class, 'index']);

Route::get('/movies/create', [MovieController::class, 'create'])->middleware('auth');// FORM create

Route::post('/movies', [MovieController::class, 'store'])->name('movies.store'); // SIMPAN movie baru

Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show'); // DETAIL movie

Route::get('/login', [AuthController::class, 'formlogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/list', [MovieController::class, 'list']);

Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');

Route::put('/movies/{id}', [MovieController::class, 'update'])->name('movies.update');

Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');

// use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\MovieController;

// Route::get('/', [MovieController::class, 'index']);

// Route::resource('movies', MovieController::class);  

// Route::get('/movies/{id}', [MovieController::class, 'show'])->name('detail_movie');

// Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');

// Route::get('/movie/create', [MovieController::class, 'create']);
