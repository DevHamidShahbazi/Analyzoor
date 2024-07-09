<?php

use App\Http\Controllers\public\ChildCategoryController;
use App\Http\Controllers\public\HomeController;
use App\Http\Controllers\public\ParentCategoryController;
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

// article categories
Route::get('parent/article/category/{parentArticleCategory}', [ParentCategoryController::class, 'index'])->name('parent.article.category');
Route::get('child/article/category/{childArticleCategory}', [ChildCategoryController::class, 'index'])->name('child.article.category');
