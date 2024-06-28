<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class MenuAdminRequest extends FormRequest
{
    public function rules(): array
    {
        if(Str::contains($this->route()->getName(),'store')){
            return [
                'sort'=>'required',
                'name'=>'required',
            ];
        }

        if(Str::contains($this->route()->getName(),'update')){
            return [
                'sort'=>'required',
                'name'=>'required',
            ];
        }
    }
}
