<?php

use App\Http\Controllers\Auth\CaptchaController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ResetPasswordWithPhoneController;
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


Route::get('/select-type/reset-password/', [ResetPasswordController::class, 'selectType'])->name('reset.password.selectType');

//resetPassword with phone
Route::get('/phone/password/reset', [ResetPasswordWithPhoneController::class, 'showLinkRequestForm'])->name('password.request.phone'); //show form request code
Route::post('/phone/password/reset/send/', [ResetPasswordWithPhoneController::class, 'passwordResetSmsSend'])->name('password.reset.phone.send'); //send request code
Route::get('/phone/password/reset/verify/show', [ResetPasswordWithPhoneController::class, 'showLinkRequestFormVerify'])->name('password.verify.phone.show'); //show form verify code
Route::post('/phone/password/reset/verify/', [ResetPasswordWithPhoneController::class, 'passwordResetSmsVerify'])->name('password.reset.verify.phone'); //verify code


//resetPassword with email
Route::get('/password/reset', [ResetPasswordController::class, 'showLinkRequestForm'])->name('password.request'); //show form request
