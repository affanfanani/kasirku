<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', DashboardController::class)
    ->middleware('auth')
    ->name('dashboard.index');


Route::resource('transactions', TransactionController::class)
    ->middleware('auth');

Route::resource('products', ProductController::class)
    ->middleware('auth');

Route::resource('customers', CustomerController::class)
    ->middleware('auth');

Route::get(
    'transactions/download/pdf',
    [TransactionController::class, 'downloadRekap']
)->name('transactions.download.rekap')
 ->middleware('auth');

Route::get(
    'transactions/{id}/download',
    [TransactionController::class, 'download']
)->name('transactions.download')
 ->middleware('auth');
