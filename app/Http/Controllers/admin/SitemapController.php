<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $parentCategory = Category::where('parent_id','0')->get();
        $childCategory = Category::where('parent_id','!=','0')->get();
        $article = Article::where('is_active','1')->get();

        return view('admin.sitemap.index',compact('parentCategory','childCategory','article'));
    }
}
