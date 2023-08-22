<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tambah', [HomeController::class, 'tambah']);
Route::post('/tambah', [HomeController::class, 'store'])->name('store');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/edit/{id}', [HomeController::class, 'Edit'])->name('Edit');
Route::put('/edit/{id}', [HomeController::class, 'edit_produk'])->name('edit_produk');
Route::delete('/delete/{id}', [HomeController::class, 'Delete'])->name('delete');



