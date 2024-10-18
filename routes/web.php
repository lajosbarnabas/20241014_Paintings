<?php

use App\Http\Controllers\PaintingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PaintingController::class, 'index']);
Route::get('/artists', [PaintingController::class, 'showArtists']);
Route::get('/paintings/{title}',[PaintingController::class, 'show']);
Route::get('/artists/{artist}',[PaintingController::class, 'showArtistPaints']);
Route::post('/paintings/search-by-title', [PaintingController::class, 'searchByTitle']);
Route::post('/paintings/search-by-artist', [PaintingController::class, 'searchByArtist']);