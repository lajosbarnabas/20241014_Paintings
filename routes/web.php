<?php

use App\Http\Controllers\PaintingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PaintingController::class, 'index']);
Route::get('/paintings/{title}',[PaintingController::class, 'show']);
Route::post('/paintings/search-by-title', [PaintingController::class, 'searchByTitle']);