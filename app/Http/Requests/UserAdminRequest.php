<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UserAdminRequest extends FormRequest
{
    public function rules(): array
    {
        if(Str::contains($this->route()->getName(),'store')){
            return [
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required','digits:11',
                    'regex:/^09(1[0-9]|9[0-2]|2[0-2]|0[1-5]|41|3[0,3,5-9])\d{7}$/',
                    'unique:users'],
                'level' => ['required'],
                'password' => ['required', 'string', 'min:4'],
                'email' => [$this->request->get('email') != null ? 'unique:users' : ''],
                'courses' => ['nullable', 'array'],
                'courses.*' => ['exists:courses,id'],
            ];
        }

        if(Str::contains($this->route()->getName(),'update')){
            return [
                'name' => ['required'],
                'verify' => ['required'],
                'level' => ['required'],
                'password' => ['nullable', 'string', 'min:4'],
                'email' => ['unique:users,email,'.$this->route('user')->id],
                'courses' => ['nullable', 'array'],
                'courses.*' => ['exists:courses,id'],
            ];
        }


    }
}
