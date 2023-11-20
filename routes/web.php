<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect(route('dashboard'));
});
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::get('/', function () {
    return redirect(route('dashboard'));
});
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
Route::get('/transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
Route::get('/transaction/{transaction}', [TransactionController::class, 'show'])->name('transaction.show');
Route::get('/transaction/{transaction}/edit', [TransactionController::class, 'edit'])->name('transaction.edit');
Route::put('/transaction/{transaction}', [TransactionController::class, 'update'])->name('transaction.update');
Route::delete('/transaction/{transaction}', [TransactionController::class, 'destroy'])->name('transaction.destroy');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
// routes/web.php


Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::get('/payment/create/{transaction}', [PaymentController::class, 'create'])->name('payment.create');
Route::post('/payment/store/{transaction}', [PaymentController::class, 'store'])->name('payment.store');

Route::get('/payment/{payment}', [PaymentController::class, 'show'])->name('payment.show');
Route::get('/payment/{payment}/edit', [PaymentController::class, 'edit'])->name('payment.edit');
Route::put('/payment/{payment}', [PaymentController::class, 'update'])->name('payment.update');
Route::delete('/payment/{payment}', [PaymentController::class, 'destroy'])->name('payment.destroy');
Route::group(['prefix' => 'dashboard'], function () {
    Auth::routes();

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/lang/{locale}', [App\Http\Controllers\HomeController::class, 'lang'])->name('lang');
});

// require('admin.php');

