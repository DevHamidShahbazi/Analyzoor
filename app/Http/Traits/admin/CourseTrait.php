<?php

namespace App\Http\Traits\admin;

use Illuminate\Support\Facades\File;

trait CourseTrait
{
    private function RequestsArray($request)
    {
        return [
            'name' => $request['name'],
            'body' => $request['body'],
            'price' => $request['price'],
            'discount' => $request['discount'],
            'time' => $request['time'],
            'status' => $request['status'],
            'type' => $request['type'],
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
        $img=$this->FileUploader($file,'/Upload/image/course/');
        $article->update(['image' => $img]);
    }
}
