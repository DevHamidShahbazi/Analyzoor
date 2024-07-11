<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ParentCategoryController extends Controller
{
    public function index(Category $category)
    {
        $articles = $category->articles()->where('is_active','1')->latest()->paginate(15);
        $articles_children = $category->allArticles()->whereNotIn('id',$articles->pluck('id')->toArray());
        $children = $category->children()->get();
        return view('public.parent-article-category',compact('category','articles','children','articles_children'));
    }
}
