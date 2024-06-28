<?php


use App\Http\Controllers\admin\FilePrivateController;
use App\Http\Controllers\admin\FilePublicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resource('file', FilePublicController::class)->except(['show','create','edit']);

Route::resource('private-file', FilePrivateController::class)->except(['show','create','edit']);

