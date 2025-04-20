<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursePublicRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            //
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'filter' => array_map(function ($value) {
                return is_array($value) ? implode(',', $value) : $value;
            }, $this->get('filter', []))
        ]);
    }

}
