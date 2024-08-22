<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});



Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create',  [ProductController::class, 'create']);
Route::get('/products/{product}',  [ProductController::class, 'show']);
Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
Route::post('/products', [ProductController::class, 'store']);
Route::patch('/products/{product}', [ProductController::class, 'update']);
Route::delete('/products/{product}', [ProductController::class, 'delete']);
