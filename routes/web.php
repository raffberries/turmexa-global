<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/our-products', [PageController::class, 'products'])->name('products');
Route::get('/our-products/{slug}', [PageController::class, 'show'])->name('products.show');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Inquiry Route
Route::post('/inquiry', [PageController::class, 'storeInquiry'])->name('inquiry.store');