<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $parentArticleCategories = Category::whereIn('id',setting_with_key('parent_categories_home')->value)->get();
        $childrenArticleCategories = Category::whereIn('id',setting_with_key('children_categories_home')->value)->get();

        return view('public.Home',compact('childrenArticleCategories','parentArticleCategories'));
    }
}
