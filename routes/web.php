<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
});

Route::middleware('auth')->group(function () {

    Route::resource('dashboard', DashboardController::class);

    Route::resource('products', ProductController::class);
    Route::get('products/{product}/edit-stock', [ProductController::class, 'editStock'])->name('products.edit-stock');
    Route::post('products/{product}/update-stock', [ProductController::class, 'updateStock'])->name('products.update-stock');

    Route::resource('sales', SaleController::class);

    Route::resource('suppliers', SupplierController::class);

    Route::resource('customers', CustomerController::class);
});

require __DIR__.'/auth.php';
