<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;


Route::get('/', [MovieController::class, 'index']);
Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');
Route::get('/movies/create', [MovieController::class, 'create']);
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');