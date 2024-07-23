<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Http\Traits\pub\CommentTrait;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use CommentTrait;

    public function index(Article $article)
    {
        $all_categories = $article->getAllCategories();
        $articles = $article->category->articles()->where('is_active','1')->where('id','!=',$article->id)->take(10)->get();
        $urls = $article->urls()->where('for_download','1')->get();
        $files = $article->files()->where('for_download','1')->get();
        return view('public.article',compact('article','all_categories','articles','urls','files'));
    }

    public function store_comment(Request $request)
    {
        $this->validate_store();
        $article = Article::find($request['commentable_id']);
        if(!$article) {
            return redirect()->back()->with('error', 'مقاله ای پیدا نشد');
        }

        Comment::create([
            'commentable_id' => $request['commentable_id'],
            'commentable_type' => Article::class,
            'parent_id'=>'0',
            'is_active'=>'0',
            'user_id'=>auth()->user()->id,
            'comment'=>$request['comment']
        ]);

        return redirect(route('article.detail',$article->slug))->with('success','نظر شما با موفقیت ثبت شد بعد از تایید به نمایش گذاشته می شود');
    }

    public function result_comment(Request $request)
    {
        $this->validate_result();
        $article = Article::find($request['commentable_id']);

        if(!$article) {
            return redirect()->back()->with('error', 'مقاله ای پیدا نشد');
        }

        Comment::create([
            'commentable_id' => $request['commentable_id'],
            'commentable_type' => Article::class,
            'parent_id'=>$request['parent_id'],
            'is_active'=>'0',
            'user_id'=>auth()->user()->id,
            'comment'=>$request['comment']
        ]);

        return redirect(route('article.detail',$article->slug))->with('success','نظر شما با موفقیت ثبت شد بعد از تایید به نمایش گذاشته می شود');
    }

}
