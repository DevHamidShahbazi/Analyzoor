<?php

namespace App\Http\Traits\admin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait EpisodeTrait
{
    private function RequestsArray($request)
    {
        return [
            'name' => $request['name'],
            'body' => $request['body'],
            'time' => $request['time'],
            'type' => $request['type'],
            'title' => $request['title'],
            'keywords' => $request['keywords'],
            'description' => $request['description'],
            'course_id' => $request['course_id'],
        ];
    }

    private function storeFile($request,$requestName,$directory)
    {
        return $request->file($requestName)->store($directory);
    }

    private function updateFile($request,$Path,$requestName,$directory)
    {
        if ($request->hasFile($requestName)) {
            $oldPath = storage_path('app/uploads/' . $Path);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
            return $request->file($requestName)->store($directory);
        }
    }
}
