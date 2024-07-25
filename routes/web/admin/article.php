<?php

use App\Http\Controllers\admin\ArticleController;
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


Route::resource('article', ArticleController::class);

Route::resource('article-file', FileArticleController::class);

Route::resource('article-url', UrlArticleController::class);


//copy article
Route::post('article/copy', [ArticleController::class, 'article_copy'])->name('article.copy');


Route::post('article/is_active', [ArticleController::class, 'article_is_active'])->name('article.is_active');
