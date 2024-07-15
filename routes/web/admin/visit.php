<?php


use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\VisitController;
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


Route::get('/visit', [VisitController::class, 'index'])->name('visit.index');
Route::post('/visit', [VisitController::class, 'chart']);
Route::post('/visit/location', [VisitController::class, 'location']);
