<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Article $article)
    {
        $all_categories = $article->getAllCategories();
        $articles = $article->category->articles()->where('is_active','1')->where('id','!=',$article->id)->take(10)->get();
        return view('public.article',compact('article','all_categories','articles'));
    }
}
