<?php

use App\Http\Controllers\public\ArticleController;
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

Route::get('articles', [ArticleController::class, 'index'])->name('article.index');
Route::get('article/detail/{ArticleDetail}', [ArticleController::class, 'detail'])->name('article.detail');

#comments

Route::middleware(['auth','throttle:100,2'])->group(function () {
    Route::post('article/store/comment', [ArticleController::class, 'store_comment'])->name('article.store.comment');
    Route::post('article/result/comment', [ArticleController::class, 'result_comment'])->name('article.result.comment');
});
