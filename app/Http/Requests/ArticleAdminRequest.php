<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ArticleAdminRequest extends FormRequest
{
    public function rules(): array
    {
        if(Str::contains($this->route()->getName(),'store')){
            return [
                'name'=>['required ',' unique:articles'],
                'body' => 'required',
                'article_category_id' => 'required',
                'image' => 'required|max:5000',
            ];
        }

        if(Str::contains($this->route()->getName(),'update')){
            return [
                'name'=>['required ',' unique:articles,name,'.$this->route('article')->id],
                'body' => 'required',
                'image' => 'max:5000',
            ];
        }
    }
}
