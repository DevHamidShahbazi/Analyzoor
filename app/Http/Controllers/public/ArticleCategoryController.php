<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    public function index(Category $category)
    {
        $articles = $category->articles()->where('is_active','1')->latest()->paginate(20);
        return view('public.article-category',compact('articles','category'));
    }
}
