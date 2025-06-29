<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/categoryIndex', [CategoryController::class , 'index'])->name('category.index');
Route::get('/categoryCreate', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categoryAdd', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categoryEdit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/categoryUpdate/{id}', [CategoryController::class, 'update'])->name('category.update');

Route::get('/productIndex', [ProductController::class, 'index'])->name('product.index');
Route::get('/productCreate', [ProductController::class, 'create'])->name('product.create');
Route::post('/productAdd', [ProductController::class, 'store'])->name('product.store');
Route::get('/productEdit/{id}',[ProductController::class, 'edit'])->name('product.edit');
Route::put('/productUpdate/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/productDelete/{id}', [ProductController::class, 'delete'])->name('product.delete');

require __DIR__.'/auth.php';
