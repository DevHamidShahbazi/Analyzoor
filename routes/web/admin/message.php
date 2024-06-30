<?php


use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\MessageController;
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


Route::resource('message', MessageController::class)->except(['show','create','edit','store','update']);

