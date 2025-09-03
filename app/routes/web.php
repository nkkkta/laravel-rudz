<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/qa', function () {
    return view('qa');
});


Route::get('/news', function () {
    return view('news');
});


Route::get('/login', function () {
    return view('login');
});


Route::get('/register', function () {
    return view('register');
});

Route::get('/category', [CategoryController::class, 'get']);

Route::get('/product', [ProductController::class, 'index']);

// Route::get('/admin', [AdminController::class, 'dashboard']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('products', AdminProductController::class);
});



