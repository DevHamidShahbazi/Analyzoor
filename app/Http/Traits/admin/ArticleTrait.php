<?php

namespace App\Http\Traits\admin;

use App\Models\Article;
use Illuminate\Support\Facades\File;

trait ArticleTrait
{

    private function filter($request)
    {
        $all = collect([]);
        $category_id = $request['category_id'];

        $query = Article::query();
        $query->when($category_id, function ($qu) use ($category_id) {
            $qu->where('category_id', $category_id)->latest();
        });

        $all [] = $query->latest()->get();

        return $all->collapse();
    }

    private function RequestsArray($request)
    {
        return [
            'name' => $request['name'],
            'body' => $request['body'],
            'is_active' => $request['is_active'],
            'title' => $request['title'],
            'keywords' => $request['keywords'],
            'description' => $request['description'],
            'category_id' => $request['category_id'],
            'alt' => $request['alt'],
        ];
    }

    private function UpdateImage($file,$article)
    {
        if ($article->image != null){
            File::delete(public_path($article->image));
        }
        $img=$this->FileUploader($file,'/Upload/image/article/');
        $article->update(['image' => $img]);
    }

    private function CheckFiles($article)
    {
        $checkFiles = $article->files()->get();
        if (count($checkFiles) > 0){
            foreach ($checkFiles as $value){
                File::delete(public_path($value->image));
            }
        }
    }
}
