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

Route::get('episode/detail/{EpisodeDetail}', [EpisodeController::class, 'detail'])->name('episode.detail');

Route::get('episodes/{episode}/download', [EpisodeController::class, 'downloadVideo'])->name('episodes.download');

#comments

Route::middleware(['auth','throttle:100,2'])->group(function () {
    Route::post('episode/store/comment', [EpisodeController::class, 'store_comment'])->name('episode.store.comment');
    Route::post('episode/result/comment', [EpisodeController::class, 'result_comment'])->name('episode.result.comment');
});
