<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

// Rute halaman utama
Route::get('/', function () {
    return view('index');
});

// Rute login
Route::get('login/customer', [AuthController::class, 'showCustomerLogin'])->name('login.customer');
Route::post('login/customer', [AuthController::class, 'customerLogin'])->name('customer.login');
Route::get('login/seller', [AuthController::class, 'showSellerLogin'])->name('login.seller');
Route::post('login/seller', [AuthController::class, 'sellerLogin'])->name('seller.login');

// Rute dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth:customer,seller');

// Rute detail store
Route::get('store/{id}', [StoreController::class, 'show'])->name('store.detail');

// Rute order
Route::post('order', [OrderController::class, 'store'])->name('order.store');
Route::get('order/{id}', [OrderController::class, 'show'])->name('order.show');
Route::post('order/{id}/confirm', [OrderController::class, 'confirm'])->name('order.confirm');

// Rute history
Route::get('history', [OrderController::class, 'history'])->name('history');

// Rute profile
Route::get('profile', [AuthController::class, 'profile'])->name('profile');

// Rute logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('history', [OrderController::class, 'history'])->name('history')->middleware('auth:customer');
