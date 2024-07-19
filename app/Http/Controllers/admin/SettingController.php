<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\admin\SettingTrait;
use App\Http\Traits\admin\UploadFileTrait;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use SettingTrait;
    use UploadFileTrait;


    public function index()
    {
        return view('admin.setting.edit');
    }


    public function store(Request $request)
    {
        $this->validator();
        foreach (Setting::ArrayImages() as $keyName){
            if ($request->hasFile($keyName)) {
                $this->UploadImage($request,$keyName);
            }
        }
        foreach (collect($request->all())->forget(Setting::ArrayImages()) as $key =>  $value)
            if ($setting = setting_with_key($key))
                $setting->update(['value'=>$value]);

        return redirect(route('admin.setting.index'))->with('success', 'تغییرات اعمال شد');
    }
}
