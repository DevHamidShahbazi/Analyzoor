<?php

use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\EpisodeController;
use App\Http\Controllers\admin\FileArticleController;
use App\Http\Controllers\admin\UrlArticleController;
use App\Http\Controllers\admin\ChunkedUploadController;
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

// Chunked upload routes
Route::post('episode/chunked-upload', [ChunkedUploadController::class, 'upload'])->name('episode.chunked.upload');
Route::get('episode/chunked-upload/check', [ChunkedUploadController::class, 'checkChunk'])->name('episode.chunked.check');
Route::post('episode/chunked-upload/move', [ChunkedUploadController::class, 'moveToFinalLocation'])->name('episode.chunked.move');
Route::post('episode/chunked-upload/delete', [ChunkedUploadController::class, 'deleteTempFile'])->name('episode.chunked.delete');
