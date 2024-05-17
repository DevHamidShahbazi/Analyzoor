<?php

use App\Http\Controllers\Auth\CaptchaController;
use App\Http\Controllers\Auth\ResetPasswordPhoneController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\VerifyController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Auth Routes
|--------------------------------------------------------------------------
|
|
*/


Auth::routes();

/*Refresh captcha*/
Route::post('/refresh/captcha', [CaptchaController::class, 'refresh'])->name('refresh.captcha');
/*Refresh captcha*/

/*Google Socialite*/
Route::get('/auth/google/', [SocialiteController::class, 'redirectGoogle'])->name('auth.google');
Route::get('/auth/google/callback/', [SocialiteController::class, 'callbackGoogle']);
/*Google Socialite*/
