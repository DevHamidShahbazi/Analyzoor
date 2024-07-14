<?php

namespace App\Http\Traits\pub;

trait CommentTrait
{
    public function validate_store()
    {
        $this->validate(request(), [
            'commentable_id' => ['required','numeric','regex:/^[0-9]+$/'],
            'comment' => ['required'],
        ], [
            'commentable_id.required' => 'لطفا مقاله را وارد کنید',
            'comment.required' => 'لطفا نظر را وارد کنید',
        ]);
    }

    public function validate_result()
    {
        $this->validate(request(), [
            'commentable_id' => ['required','numeric','regex:/^[0-9]+$/'],
            'parent_id' => ['required','numeric','regex:/^[0-9]+$/'],
            'comment' => ['required'],
        ], [
            'commentable_id.required' => 'لطفا مقاله را وارد کنید',
            'parent_id.required' => 'لطفا مقاله اصلی را وارد کنید',
            'comment.required' => 'لطفا نظر را وارد کنید',
        ]);
    }
}
