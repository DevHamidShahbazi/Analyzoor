<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleAdminRequest;
use App\Http\Traits\admin\ArticleTrait;
use App\Http\Traits\admin\UploadFileTrait;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    use UploadFileTrait;
    use ArticleTrait;

    public function index()
    {
        $articles=Article::latest()->get();
        return view('admin.article.index',compact('articles'));
    }


    public function create()
    {
        return view('admin.article.create');
    }


    public function store(ArticleAdminRequest $request)
    {
        $file = $request['image'];
        $img=$this->FileUploader($file,'/Upload/image/article/');

        $ArrayData = $this->RequestsArray($request);
        $data = collect($ArrayData)->merge(['image'=>$img])->toArray();
        Article::create($data);

        return redirect(route('admin.article.create'))->with('success', 'مقاله با موفقیت اضافه شد');
    }


    public function show(Article $article)
    {
        //
    }


    public function edit(Article $article)
    {
        return view('admin.article.edit',compact('article'));
    }


    public function update(ArticleAdminRequest $request, Article $article)
    {
        if($request->hasFile('image')){
            $file = $request['image'];
            $this->UpdateImage($file,$article);
        }
        $article->update(collect($this->RequestsArray($request))->toArray());
        return redirect(route('admin.article.index'))->with('success', 'تغیرات اعمال شد');
    }


    public function destroy(Article $article)
    {
//        if ($article->comments()->count()){
//            $article->comments()->delete();
//        }
        File::delete(public_path($article->image));
        $article->delete();
        return response()->json(['success' => true, 'id' => $article->id]);
    }
}
