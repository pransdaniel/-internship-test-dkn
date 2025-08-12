<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TabunganController;

Route::get('/upload', [TabunganController::class, 'uploadForm'])->name('upload.form');
Route::post('/upload', [TabunganController::class, 'uploadFile'])->name('upload.file');

Route::get('/', [TabunganController::class, 'read'])->name('read');
Route::get('/edit', [TabunganController::class, 'edit'])->name('edit');
Route::post('/edit', [TabunganController::class, 'update'])->name('update');
Route::get('/reset', [TabunganController::class, 'resetFile'])->name('reset.file');
