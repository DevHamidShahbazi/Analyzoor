<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\admin\UploadFileTrait;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    use UploadFileTrait;
    public function index()
    {
        $files = File::files();
        return view('admin.file.index',compact('files'));
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        if($img=$this->FileUploader($file,'/Upload/file/')){
            File::create([
                'file' => $img,
                'alt' => '0',
                'fileable_id' => '0',
                'fileable_type' => '0',
            ]);
        }else{
            return  redirect()->back()->with('error', 'فایل بارگذاری نشد');
        }
    }

    public function update(Request $request, File $file)
    {
        if($request->hasFile('file')){
            \Illuminate\Support\Facades\File::delete(public_path($file['file']));
            $get_file = $request['file'];
            $img=$this->FileUploaderNotRename($file,$get_file,'/Upload/file/');
            $file->update(['file' => $img]);
        }
        $file->update([
            'alt' => $request['alt'],
        ]);
        return redirect()->back()->with('success', 'تغییرات اعمال شد');
    }

    public function destroy(File $file)
    {
        $file->delete();
        \Illuminate\Support\Facades\File::delete(public_path($file['file']));
        return response()->json(['success' => true, 'id' => $file->id]);
    }
}
