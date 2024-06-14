<?php

namespace App\Http\Traits\admin;

use App\Models\User;
use Illuminate\Support\Facades\File;


trait SettingTrait
{
    private function validator()
    {
        $this->validate(request(),[
            'logo' => 'max:10000',
        ],[
            'logo.max' => 'حجم عکس نباید از 10 مگابایت بیشتر باشد',
        ]);
    }


    private function UploadImage($request,$keyName)
    {
        $setting = setting_with_key($keyName);
        if ($setting->$keyName != null){
            File:: delete(public_path($setting->$keyName));
        }
        $img=$this->FileUploader($request[$keyName],"/Upload/image/$keyName/");
        $setting->update(['value' => $img]);
    }
}
