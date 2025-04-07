<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class EpisodeAdminRequest extends FormRequest
{
    public function rules(): array
    {
        if(Str::contains($this->route()->getName(),'store')){
            return [
                'name'=>['required ',' unique:episodes'],
                'type' => 'in:free,premium',
                'course_id' => 'required',
                'chapter_id' => 'nullable',
                'video' => 'required|file|mimes:mp4,mov,avi,wmv,flv,webm,ogg,3gp,3g2,mkv',
                'file' => 'nullable|file',
            ];
        }

        if(Str::contains($this->route()->getName(),'update')){
            return [
                'name'=>['required ',' unique:episodes,name,'.$this->route('episode')->id],
                'course_id' => 'required',
                'type' => 'in:free,premium',
                'chapter_id' => 'nullable',
                'video' => 'file|mimes:mp4,mov,avi,wmv,flv,webm,ogg,3gp,3g2,mkv',
                'file' => 'nullable|file',
            ];
        }
    }
}
