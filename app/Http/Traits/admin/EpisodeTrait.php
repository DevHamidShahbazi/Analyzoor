<?php

namespace App\Http\Traits\admin;

use Illuminate\Support\Facades\File;

trait EpisodeTrait
{
    private function RequestsArray($request)
    {
        return [
            'name' => $request['name'],
            'body' => $request['body'],
            'time' => $request['time'],
            'type' => $request['type'],
            'chapter_id' => $request['chapter_id'],
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

    private function updateFile($request,$oldItem,$requestName,$directory)
    {
        if ($request->hasFile($requestName)) {
            File::delete(storage_path('app/uploads/'.$oldItem->$requestName));
            $oldItem->update([
               $requestName =>  $request->file($requestName)->store($directory)
            ]);
        }
    }
}
