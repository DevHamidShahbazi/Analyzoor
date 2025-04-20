<?php

use App\Http\Controllers\public\ArticleController;
use App\Http\Controllers\public\CourseController;
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

Route::get('courses', [CourseController::class, 'index'])->name('course.index');
Route::get('course/detail/{CourseDetail}', [CourseController::class, 'detail'])->name('course.detail');

#comments

Route::middleware(['auth','throttle:100,2'])->group(function () {
    Route::post('course/store/comment', [CourseController::class, 'store_comment'])->name('course.store.comment');
    Route::post('course/result/comment', [CourseController::class, 'result_comment'])->name('course.result.comment');
});
