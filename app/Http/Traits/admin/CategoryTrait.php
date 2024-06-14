<?php

namespace App\Http\Traits\admin;

use App\Models\Category;
use Illuminate\Support\Facades\File;

trait CategoryTrait
{

    private function RequestsArray($request)
    {
        return [
            'parent_id'=>$request['parent_id'],
            'name'=>$request['name'],
            'description'=>$request['description'],
            'keywords'=>$request['keywords'],
            'alt'=>$request['alt'],
            'type'=>$request['type'],
            'title'=>$request['title'],
        ];
    }

    private function check_has_parent_id($request)
    {
        return $request['parent_id'] != 0 && !Category::find($request['parent_id']);
    }

    private function UpdateImage($file,$product,$name_request)
    {
        if ($product->$name_request != null){
            File::delete(public_path($product->$name_request));
        }
        $img=$this->FileUploader($file,'/Upload/image/category/');
        $product->update([$name_request => $img]);
    }

    private function filter($request)
    {
        $all = collect([]);
        $status = $request['type'];

        $query = Category::query();
        $query->when($status, function ($qu) use ($status) {
            $qu->where('type', $status)->latest();
        });

        $all [] = $query->latest()->get();

        return $all->collapse();
    }
}
