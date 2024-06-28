<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\admin\UploadFileTrait;
use App\Models\Article;
use App\Models\File;
use Illuminate\Http\Request;

class FileArticleController extends Controller
{

    use UploadFileTrait;

    public function index(Request $request)
    {
        $article = Article::find($request->query('id'));
        $files  = $article->files()->get();
        return view('admin.article.file.index',compact('article','files'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        if($img=$this->FileUploader($file,'/Upload/files/articles/')){
            File::create([
                'file' => $img,
                'alt' => '0',
                'fileable_id' => $request['article'],
                'fileable_type' => $request['class'],
            ]);
        }else{
            return  redirect()->back()->with('error', 'فایل بارگذاری نشد');
        }
    }

    public function show(File $file)
    {
        //
    }

    public function edit(File $file)
    {
        //
    }

    public function update(Request $request, File $article_file)
    {
        if($request->hasFile('file')){
            \Illuminate\Support\Facades\File::delete(public_path($article_file['file']));
            $file_request = $request['file'];
            $img=$this->FileUploaderNotRename($article_file['file'],$file_request,'/Upload/files/articles/');
            $article_file->update(['file' => $img]);
        }
        $article_file->update([
            'alt' => $request['alt'],
            'for_download' => $request['for_download'],
        ]);
        return redirect()->back()->with('success', 'تغییرات اعمال شد');
    }

    public function destroy(File $article_file)
    {
        $article_file->delete();
        \Illuminate\Support\Facades\File::delete(public_path($article_file['file']));
        return response()->json(['success' => true, 'id' => $article_file->id]);
    }
}
