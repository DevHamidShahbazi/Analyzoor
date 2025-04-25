<?php

namespace App\Http\Traits\admin;

trait ChapterTrail
{
    private function RequestsArray($request)
    {
        return [
            'name' => $request['name'],
            'title' => $request['title'],
            'sort' => $request['sort'],
            'course_id' => $request['course_id'],
        ];
    }
}
