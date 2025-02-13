<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = \App\Models\Article::whereIn('id',setting_with_key('articles_home')->value)->get();
        return view('public.Home',compact('articles'));
    }
}
