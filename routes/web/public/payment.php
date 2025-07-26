<?php

use App\Http\Controllers\public\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Payment Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for the application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('payment/set-product', [PaymentController::class, 'setProductSession'])->name('payment.set-product');

Route::get('payment/pre-payment', [PaymentController::class, 'prePayment'])->name('payment.pre-payment');

Route::middleware(['auth'])->group(function () {
    Route::post('payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
    Route::post('payment/enroll-free', [PaymentController::class, 'enrollFree'])->name('payment.enroll-free');
});

// Callback route (no auth required as it's called by payment gateway)
Route::get('payment/callback', [PaymentController::class, 'callback'])->name('payment.callback'); 