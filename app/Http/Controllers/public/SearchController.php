<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {

        if ($request->has('name') && $request['name'] != null){
            $search = $this->search($request);
            $name = $request['name'];
            $category = $request['category'];
            return view('public.search',compact('search','name','category'));
        }else{
            return redirect()->route('Home');
        }
    }

    private function search($request)
    {
        $all = collect([]);
        $name = $request['name'];
        $category= $request['category'];
        $queryArticle = Article::query();
        $queryCategory = Category::query();

        $queryArticle->when($name,function ($nameProduct) use ($name,$category){
            $nameProduct->where('is_active','!=','0')->where('name','like','%'.$name.'%');
        })->take(10);

        $queryCategory->when($name,function ($nameCategory) use ($name){
            $nameCategory->where('name','like','%'.$name.'%');
        })->take(10);

        if ($queryCategory->get()->isEmpty() && $queryArticle->get()->isEmpty()){
            return false;
        }

        $all [] = $queryCategory->get();
        $all [] = $queryArticle->get();
        return $all->collapse();
    }
}
