<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Pastikan ->name(...) sesuai dengan yang dipanggil di Blade
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/our-products', [PageController::class, 'products'])->name('products');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Route untuk simpan pesan
Route::post('/inquiry', [PageController::class, 'storeInquiry'])->name('inquiry.store');