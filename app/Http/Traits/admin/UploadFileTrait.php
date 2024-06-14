<?php

namespace App\Http\Traits\admin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadFileTrait
{
    public function FileUploader($file,$dir)
    {
//        set_time_limit(1800);
//        ini_set('memory_limit','10G');
        $filename = Str::random(5).'-'.env('APP_NAME').'.'.$file->getClientOriginalExtension();
        $path = public_path($dir);
        $file->move($path, $filename);
        return $dir . $filename;
    }

    public function FileUploaderNotRename($oldName,$file,$dir)
    {
//        set_time_limit(1800);
//        ini_set('memory_limit','10G');
        $fileOldName=pathinfo($oldName->image, PATHINFO_FILENAME);
        $fileNewName = $fileOldName.'.'.$file->getClientOriginalExtension();
        $path = public_path($dir);
        $file->move($path, $fileNewName);
        return $dir . $fileNewName;
    }

    public function UploadFilePrivate($file,$dir)
    {
        $filename = $file->getClientOriginalName();
        Storage::putFileAs($dir,$file,$filename);
        return $dir.$filename;
    }
}
