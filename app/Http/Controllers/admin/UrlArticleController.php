<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Url;
use Illuminate\Http\Request;

class UrlArticleController extends Controller
{

    public function index(Request $request)
    {
        $article = Article::find($request->query('id'));
        $urls = $article->urls()->get();
        return view('admin.article.url.index',compact('article','urls'));
    }


    public function store(Request $request)
    {
        Url::create([
            'urlable_type'=> $request['class'],
            'urlable_id'=> $request['article'],
            'name'=>$request['name'],
            'url'=>$request['url'],
        ]);
        return redirect(route('admin.article-url.index',['id'=>$request['article']]))->with('success', 'اضافه شد');
    }

    public function update(Request $request, Url $article_url)
    {
        $article_url->update([
            'name'=>$request['name'],
            'url'=>$request['url'],
        ]);
        return redirect(route('admin.article-url.index',['id'=>$request['article']]))->with('success', 'تغییرات اعمال شد');
    }


    public function destroy(Url $article_url)
    {
        $article_url->delete();
        return response()->json(['success' => true, 'id' => $article_url['id']]);
    }
}
