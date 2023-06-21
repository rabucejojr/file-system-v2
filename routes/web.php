<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

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
// start modified routes
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
Route::delete('/file/delete/{id}', [FileController::class, 'destroy'])->name('file.destroy');
// end modified routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
