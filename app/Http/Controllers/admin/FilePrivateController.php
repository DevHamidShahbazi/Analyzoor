<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\admin\UploadFileTrait;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilePrivateController extends Controller
{
    use UploadFileTrait;

    public function index()
    {
        $files = File::PrivateFiles();
        return view('admin.private-file.index',compact('files'));
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        if($file_uploaded=$this->UploadFilePrivate($file,'files/dirty/')){

            File::create([
                'file' => $file_uploaded,
                'alt' => '0',
                'is_private' => '1',
                'for_download' => '1',
                'fileable_id' => '0',
                'fileable_type' => '0',
            ]);

        }else{
            return  redirect()->back()->with('error', 'فایل بارگذاری نشد');
        }
    }


    public function update(Request $request, File $private_file)
    {
        if($request->hasFile('file')){
            Storage::disk('public')->delete($private_file['file']);
            $file_request = $request['file'];
            $img=$this->UploadFilePrivateNotRename($private_file['file'],$file_request,'files/dirty/');
            $private_file->update(['file' => $img]);
        }
        $private_file->update([
            'alt' => $request['alt'],
            'for_download' => $request['for_download'],
        ]);
        return redirect()->back()->with('success', 'تغییرات اعمال شد');

    }

    public function destroy(File $private_file)
    {
        Storage::disk('public')->delete($private_file['file']);
        $private_file->delete();
        return response()->json(['success' => true, 'id' => $private_file->id]);
    }

}
