<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// Route::view('/', 'home');

Route::get('/',[FileController::class,'index'])->name('home');

Route::get('/storageLocalCreate',[FileController::class,'storageLocalCreate'])->name('storageLocalCreate');
Route::get('/storageLocalAppend',[FileController::class,'storageLocalAppend'])->name('storageLocalAppend');
Route::get('/storageLocalRead',[FileController::class,'storageLocalRead'])->name('storageLocalRead');
Route::get('/storageLocalReadMulti',[FileController::class,'storageLocalReadMulti'])->name('storageLocalReadMulti');
Route::get('/storageLocalCheckFile',[FileController::class,'storageLocalCheckFile'])->name('storageLocalCheckFile');
Route::get('/storageLocalStoreJson',[FileController::class,'storageLocalStoreJson'])->name('storageLocalStoreJson');

Route::get('/storageLocalReadJson',[FileController::class,'storageLocalReadJson'])->name('storageLocalReadJson');
Route::get('/storageLocalList',[FileController::class,'storageLocalList'])->name('storageLocalList');
Route::get('/storageLocalDelete',[FileController::class,'storageLocalDelete'])->name('storageLocalDelete');
Route::get('/storageFolderDelete',[FileController::class,'storageFolderDelete'])->name('storageFolderDelete');
Route::get('/storageFolderCreate',[FileController::class,'storageFolderCreate'])->name('storageFolderCreate');

Route::get('/storageLocalListFilesMetadados',[FileController::class,'storageLocalListFilesMetadados'])->name('storageLocalListFilesMetadados');
Route::get('/storageLocalListDownload',[FileController::class,'storageLocalListDownload'])->name('storageLocalListDownload');

// DOwnload
Route::get('/download/{file}',function($file){return response()->download('storage/app/'.$file);})->name('download');

Route::post('/storageLocalUpload',[FileController::class,'storageLocalUpload'])->name('storageLocalUpload');