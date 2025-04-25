<?php

namespace App\Http\Traits\admin;

trait QuestionTrail
{
    private function RequestsArray($request)
    {
        return [
            'description' => $request['description'],
            'title' => $request['title'],
            'course_id' => $request['course_id'],
        ];
    }
}
