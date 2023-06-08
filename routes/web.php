<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/app', function () {
    return view('partials.app');
});
Route::get('/table', [FileController::class, 'table'])->name('table');
Route::get('/dashboard', [FileController::class, 'dashboard'])->name('dashboard');
Route::get('/upload', [FileController::class, 'upload'])->name('upload');
Route::post('/store', [FileController::class, 'store'])->name('store');
Route::post('/file/delete', [FileController::class, 'delete'])->name('delete');

Route::get('/table2', [FileController::class, 'table2'])->name('file.table2');
Route::get('/fetch-files', [FileController::class, 'fetchFiles'])->name('file.fetch');
Route::get('/file/{id}/edit', [FileController::class, 'edit'])->name('file.edit');
Route::post('/file/update/{id}', [FileController::class, 'update'])->name('file.update');
