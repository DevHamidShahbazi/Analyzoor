<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $arrayParentCategory = ['1'];
        $arrayChildCategory = ['2','3','4','5'];

        $parentArticleCategories = Category::
        where('parent_id',0)
            ->whereIn('id',$arrayParentCategory)
            ->where('type','article')->get();

        $childArticleCategories = Category::
        whereIn('parent_id',$parentArticleCategories->pluck('id')->toArray())
        ->whereIn('id',$arrayChildCategory)
        ->where('type','article')->get();

        return view('public.Home',compact('childArticleCategories','parentArticleCategories'));
    }
}
