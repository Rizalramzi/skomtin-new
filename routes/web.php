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

Route::get('/my-store', [StoreController::class, 'showStoreForSeller'])->name('store');
Route::post('/order/update-status/{id}', [OrderController::class, 'updateStatus'])->name('order.updateStatus');
Route::middleware(['auth:seller'])->group(function () {
    Route::get('/my-store/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/my-store/items', [ItemController::class, 'store'])->name('items.store');
    Route::get('/my-store/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/my-store/items/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/my-store/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

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


// Rute keranjang
Route::post('/add-to-cart', [OrderController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [OrderController::class, 'viewCart'])->name('cart.view');

// Rute Checkout
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');

