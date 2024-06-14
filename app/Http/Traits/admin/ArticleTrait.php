<?php

namespace App\Http\Traits\admin;

use Illuminate\Support\Facades\File;

trait ArticleTrait
{

    private function RequestsArray($request)
    {
        return [
            'name' => $request['name'],
            'body' => $request['body'],
            'is_active' => $request['is_active'],
            'title' => $request['title'],
            'keywords' => $request['keywords'],
            'description' => $request['description'],
            'category_id' => $request['article_category_id'],
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
}
