<?php

use App\Http\Controllers\public\ArticleController;
use App\Http\Controllers\public\EpisodeController;
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

Route::get('episode/detail/{EpisodesDetail}', [EpisodeController::class, 'detail'])->name('episode.detail');

Route::get('episodes/{episode}/download', [EpisodeController::class, 'downloadVideo'])->name('episodes.download');

#comments

//Route::middleware(['auth','throttle:100,2'])->group(function () {
//    Route::post('article/store/comment', [ArticleController::class, 'store_comment'])->name('article.store.comment');
//    Route::post('article/result/comment', [ArticleController::class, 'result_comment'])->name('article.result.comment');
//});
