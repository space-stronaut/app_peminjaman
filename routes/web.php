<?php

use App\Http\Controllers\AlatController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PeminjamanController;
use App\Models\Alat;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('category', CategoryController::class);
Route::resource('alat', AlatController::class);
Route::resource('peminjaman', PeminjamanController::class);
Route::put('validasi/{id}', [PeminjamanController::class, 'validasi'])->name('peminjaman.validasi');
Route::get('/pdf/peminjaman/{id}', [PeminjamanController::class, 'export'])->name('peminjaman.export');
