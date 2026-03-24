<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

// Route::view('/', 'home');

Route::get('/',[FileController::class,'index']);

Route::get('/storageLocalCreate',[FileController::class,'storageLocalCreate'])->name('storageLocalCreate');
