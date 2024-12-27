<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SaleController;

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('dashboard', DashboardController::class);

    Route::resource('products', ProductController::class);
    Route::get('products/{product}/edit-stock', [ProductController::class, 'editStock'])->name('products.edit-stock');
    Route::post('products/{product}/update-stock', [ProductController::class, 'updateStock'])->name('products.update-stock');

    Route::resource('sales', SaleController::class)->only(['index', 'create', 'store']);
});

require __DIR__.'/auth.php';
