<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EpisodeAdminRequest extends FormRequest
{
    public function rules(): array
    {
        if(Str::contains($this->route()->getName(),'store')){
            return [
                'name' => ['required', 'unique:episodes'],
                'type' => 'in:free,premium',
                'course_id' => 'required',
                'chapter_id' => 'nullable',
                'video' => 'nullable|file|mimes:mp4,mov,avi,wmv,flv,webm,ogg,3gp,3g2,mkv',
                'video_path' => 'nullable|string',
                'video_is_new' => 'nullable|in:0,1',
                'file' => 'nullable|file',
                'file_path' => 'nullable|string',
                'file_is_new' => 'nullable|in:0,1',
                'file_delete' => 'nullable|in:0,1',
            ];
        }

        if(Str::contains($this->route()->getName(),'update')){
            return [
                'name' => ['required', Rule::unique('episodes')->ignore($this->route('episode')->id)],
                'course_id' => 'required',
                'type' => 'in:free,premium',
                'chapter_id' => 'nullable',
                'video' => 'nullable|file|mimes:mp4,mov,avi,wmv,flv,webm,ogg,3gp,3g2,mkv',
                'video_path' => 'nullable|string',
                'video_is_new' => 'nullable|in:0,1',
                'file' => 'nullable|file',
                'file_path' => 'nullable|string',
                'file_is_new' => 'nullable|in:0,1',
                'file_delete' => 'nullable|in:0,1',
            ];
        }
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // For store operation, require either video file or video_path
            if (Str::contains($this->route()->getName(), 'store')) {
                if (!$this->hasFile('video') && !$this->filled('video_path')) {
                    $validator->errors()->add('video', 'فیلد ویدیو اجباری است.');
                }
            }
        });
    }
}
