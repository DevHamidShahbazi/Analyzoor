<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\admin\UrlTrait;
use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    use UrlTrait;

    public function index()
    {
        $urls = Url::latest()->get();
        return view('admin.url.index',compact('urls'));
    }

    public function store(Request $request)
    {
        Url::create($this->ArrayData($request));
        return redirect(route('admin.url.index'))->with('success', 'اضافه شد');
    }

    public function update(Request $request, Url $url)
    {
        $url->update($this->ArrayData($request));
        return redirect(route('admin.url.index'))->with('success', 'تغییرات اعمال شد');
    }

    public function destroy(Url $url)
    {
        $url->delete();
        return response()->json(['success' => true, 'id' => $url['id']]);
    }
}
