<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ParentCategoryController extends Controller
{
    public function index(Category $category)
    {
        $children = $category->children()->get();
        $articles = $category->articles()->where('is_active','1')->latest()->paginate(1);
        return view('public.parent-article-category',compact('category','articles','children'));
    }
}
