<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

// Halaman utama katalog produk
Route::get('/', [CatalogController::class, 'index'])->name('index');
Route::get('/create', [CatalogController::class, 'create'])->name('create');
Route::post('/store', [CatalogController::class, 'store'])->name('store');

// Halaman pemilik untuk menambah produk baru
Route::get('/owner/products/create', [CatalogController::class, 'create'])->name('products.create');
Route::post('/owner/products', [CatalogController::class, 'store'])->name('products.store');

// Halaman untuk mengedit produk
Route::get('/owner/products/{id}/edit', [CatalogController::class, 'edit'])->name('products.edit');
Route::put('/owner/products/{id}', [CatalogController::class, 'update'])->name('products.update');

// Route untuk menghapus produk
Route::delete('/owner/products/{id}', [CatalogController::class, 'destroy'])->name('products.destroy');

