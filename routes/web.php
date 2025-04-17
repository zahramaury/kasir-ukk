<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('main');
})->name('main');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::patch('/product/{id}/update-stock', [ProductController::class, 'updateStock'])->name('product.updateStock');



Route::get('pembelian', [SaleController::class, 'index'])->name('pembelian.index');
// Route::get('/sale/{id}', [SaleController::class, 'show']);
Route::get('/pembelian/create', [SaleController::class, 'create'])->name('pembelian.create');
// Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');
Route::get('sales/{sale}', [SaleController::class, 'show'])->name('sales.show');


Route::get('/users', [UserController::class, 'index'])->name('user.index');  // Menampilkan daftar pengguna
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');  // Edit pengguna
Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');  // Update pengguna
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');  // Form pembuatan pengguna
Route::post('/users', [UserController::class, 'store'])->name('user.store');  // Simpan pengguna baru
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');  // Hapus pengguna





