<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddressController;

Route::get('/',[HomeController::class, 'home'])->name('home');
Route::get('/home',[HomeController::class, 'home']);
Route::view('/register','user.register')->name('register'); 
Route::view('/index','product.index')->name('productpage');
Route::get('/profile',[UserController::class, 'show'])->name('profile');
Route::view('/login','auth.login')->name('login');

Route::get('/coupons', [CouponController::class, 'index'])->name('coupons');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('users')->group(function () {
    Route::get('/{name}/{id}', [UserController::class, 'show'])->name('user');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::post('/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy'); //users
});
Route::prefix('products')->group(function () {
    Route::get('/',[HomeController::class, 'home'])->name('products');
    Route::get('/{slug}/{id}', [ProductController::class, 'show'])->name('product');
    Route::post('/', [ProductController::class, 'store'])->name('product.store');
    Route::post('/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('product.destroy'); //products
});
Route::prefix('addresses')->group(function () {
    Route::get('/', [AddressController::class, 'index'])->name('addresses');
    Route::get('/{id}', [AddressController::class, 'show'])->name('address');
    Route::post('/', [AddressController::class, 'store'])->name('address.store');
    Route::post('/{id}', [AddressController::class, 'update'])->name('address.update');
    Route::delete('/{id}', [AddressController::class, 'destroy'])->name('address.destroy'); //addesses
});
Route::prefix('reviews')->group(function () {
    Route::get('/', [ReviewController::class, 'index'])->name('reviews');
    Route::get('/{id}', [ReviewController::class, 'show'])->name('review');
    Route::post('/', [ReviewController::class, 'store'])->name('review.store');
    Route::post('/{id}', [ReviewController::class, 'update'])->name('review.update');
    Route::delete('/{id}', [ReviewController::class, 'destroy'])->name('review.destroy'); //reviews
});
Route::prefix('coupons')->group(function () {
    Route::get('/', [CouponController::class, 'index'])->name('coupons');
    Route::get('/{id}', [CouponController::class, 'show'])->name('coupon');
    Route::post('/', [CouponController::class, 'store'])->name('coupon.store');
    Route::post('/{id}', [CouponController::class, 'update'])->name('coupon.update');
    Route::delete('/{id}', [CouponController::class, 'destroy'])->name('coupon.destroy'); //coupons
});
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::put('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');
});
