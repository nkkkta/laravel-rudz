<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});

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



