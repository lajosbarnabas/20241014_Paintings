<?php

use App\Http\Controllers\PaintingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PaintingController::class, 'index']);