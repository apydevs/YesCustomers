<?php

use Apydevs\Customers\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'web',
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
// Route::get('/customers/create', [CustomersController::class, 'create'])->name('customers.create');
// Route::post('/customers', [CustomersController::class, 'store'])->name('customers.store');
// Route::get('/customers/{customer}', [CustomersController::class, 'show'])->name('customers.show');
// Route::get('/customers/{customer}/edit', [CustomersController::class, 'edit'])->name('customers.edit');
// Route::put('/customers/{customer}', [CustomersController::class, 'update'])->name('customers.update');
// Route::delete('/customers/{customer}', [CustomersController::class, 'destroy'])->name('customers.destroy');
});
