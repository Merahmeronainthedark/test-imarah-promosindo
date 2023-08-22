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

Route::get('/', [HomeController::class, 'index']);
Route::get('/tambah', [HomeController::class, 'tambah']);
Route::post('/tambah', [HomeController::class, 'store_produk'])->name('store_produk');
Route::get('/detail/{slug}', [HomeController::class, 'detail'])->name('detail');
Route::get('/edit/{slug}', [HomeController::class, 'Edit'])->name('Edit');
Route::post('/', [HomeController::class, 'edit'])->name('edit_produk');
Route::delete('/', [HomeController::class, 'Delete'])->name('delete');

