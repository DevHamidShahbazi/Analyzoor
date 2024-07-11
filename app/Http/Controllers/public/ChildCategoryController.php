<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ChildCategoryController extends Controller
{
    public function index(Category $category)
    {
        $all_parents = $category->allParents();
        $articles = $category->articles()->where('is_active','1')->latest()->paginate(15);
        $articles_parents = $category->getAllParentArticles()->whereNotIn('id',$articles->pluck('id')->toArray());
        $children = $category->children()->get();
        return view('public.child-article-category',compact('category','articles','children','articles_parents','all_parents'));
    }
}
