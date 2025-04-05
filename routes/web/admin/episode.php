<?php

use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\EpisodeController;
use App\Http\Controllers\admin\FileArticleController;
use App\Http\Controllers\admin\UrlArticleController;
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


Route::resource('episode', EpisodeController::class);
Route::get('episode/video/show/{episode_id}', [EpisodeController::class, 'video_show'])->name('episode.video.show');
Route::get('episode/file/show/{episode_id}', [EpisodeController::class, 'file_show'])->name('episode.file.show');
