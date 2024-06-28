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
        $fileOldName=pathinfo($oldName, PATHINFO_FILENAME);
        $fileNewName = $fileOldName.'.'.$file->getClientOriginalExtension();
        $path = public_path($dir);
        $file->move($path, $fileNewName);
        return $dir . $fileNewName;
    }

    public function UploadFilePrivate($file,$dir)
    {

        $filename = $file->getClientOriginalName();
        Storage::disk('public')->put($dir.'/'.$filename,file_get_contents($file));
        return $dir.$filename;
    }

    public function UploadFilePrivateNotRename($oldName,$file,$dir)
    {
        $fileOldName=pathinfo($oldName, PATHINFO_FILENAME);
        $fileNewName = $fileOldName.'.'.$file->getClientOriginalExtension();
        Storage::disk('public')->put($dir.'/'.$fileNewName,file_get_contents($file));
        return $dir.$fileNewName;
    }
}
