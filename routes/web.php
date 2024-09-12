<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


// user
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}',  [ProductController::class, 'show']);



// login, register
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('throttle:5,1');

Route::get('/login', [LoginUserController::class, 'create'])->name('login');
Route::post('/login', [LoginUserController::class, 'store'])->middleware('throttle:5,1');
Route::post('/logout', [LoginUserController::class, 'destroy']);



// cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');


// admin
Route::get('/admin', [AdminController::class, 'index'])->middleware(AdminMiddleware::class);
Route::get('/admin/products', [AdminController::class, 'showproducts'])->middleware(AdminMiddleware::class);
Route::get('/admin/products/create',  [AdminController::class, 'create'])->middleware(AdminMiddleware::class);
Route::get('/admin/products/{product}/edit', [AdminController::class, 'edit'])->middleware(AdminMiddleware::class);
Route::post('/admin/products', [AdminController::class, 'store'])->middleware(AdminMiddleware::class);
Route::patch('/admin/products/{product}', [AdminController::class, 'update'])->middleware(AdminMiddleware::class);
Route::delete('/admin/products/{product}', [AdminController::class, 'delete'])->middleware(AdminMiddleware::class);


// users
Route::get('/admin/users', [AdminController::class, 'users'])->middleware(AdminMiddleware::class);
Route::delete('/admin/users/{user}', [AdminController::class, 'userdelete'])->middleware(AdminMiddleware::class);;


// checkout
Route::get('/checkout', [CheckoutController::class, 'checkout'])->middleware('auth');
Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->middleware('auth');
Route::get('/thankyou', function () {
    return view('checkout.thankyou');
})->middleware('auth');


// orders
Route::get('/admin/orders', [OrderController::class, 'index'])->middleware(AdminMiddleware::class);

Route::patch('/admin/orders/{order}/status', [OrderController::class, 'updateStatus'])->middleware(AdminMiddleware::class);
