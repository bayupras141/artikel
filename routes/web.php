<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', [App\Http\Controllers\ArtikelController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::post('/tambahkan-komentar/{artikel:id}', [App\Http\Controllers\KomenlController::class, 'store'])->name('komen.store');
Route::resource('artikel', ArtikelController::class);
Route::prefix('artikel')->middleware('auth')->group(function() {
    Route::get('/create', [App\Http\Controllers\ArtikelController::class, 'create'])->name('artikel.create');
    Route::post('/create', [App\Http\Controllers\ArtikelController::class, 'store'])->name('artikel.store');
});