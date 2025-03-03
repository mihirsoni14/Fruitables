<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');



Route::get('/testimonial', function () {
    return view('testimonial');
})->name('testimonial');

Route::get('/product-details', function () {
    return view('product-details');
})->name('product-details');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

// admin routes


Route::get('/admin/login', function () {
    return view('admin-panel.login');
})->name('admin.login');

Route::get('/admin/register', function () {
    return view('admin-panel.register');
})->name('admin.register');

Route::middleware(AuthMiddleware::class)->group(function () {


    Route::get('/dashbord', function () {
        return view('admin-panel.dashbord');
    })->name('dashbord');

    Route::get('/dashbord', function () {
        return view('admin-panel.dashbord');
    })->name('dashbord');
    Route::get('/Unauthorized', function () {
        return view('Unauthorized');
    })->name('login');

    Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
    Route::post('/cartupdate', [ProductController::class, 'cartUpdate'])->name('cart.update');
    Route::post('/cartItemRemove', [ProductController::class, 'removeItemFromCart'])->name('cart.itemRemove');
    Route::get('users/list', [UserController::class, 'index'])->name('users.list');
    Route::get('product/list', [ProductController::class, 'index'])->name('product.list');
    Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::post('product/addToCart', [ProductController::class, 'addtocart'])->name('addtocart');
    Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');
    Route::get('/order', [ProductController::class, 'proceed_checkout'])->name('proceed_checkout');
    Route::get('/orderProccess', [OrderController::class, 'store'])->name('order.store');
    Route::get('/OrderList', [OrderController::class, 'index'])->name('users.order');


});



