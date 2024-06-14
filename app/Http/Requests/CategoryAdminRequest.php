<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoryAdminRequest extends FormRequest
{
    public function rules(): array
    {
        if(Str::contains($this->route()->getName(),'store')){
            return [
                'name'=>['required','unique:categories'],
                'parent_id'=>'required',
                'type'=>'required',
                'image'=>'required | max:10000',
            ];
        }

        if(Str::contains($this->route()->getName(),'update')){
            return [
                'name'=>['required','unique:categories,name,'.$this->route('category')->id],
                'parent_id'=>'required',
                'type'=>'required',
                'image'=>'max:10000',
            ];
        }
    }
}
