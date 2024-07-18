<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryAdminRequest;
use App\Http\Traits\admin\CategoryTrait;
use App\Http\Traits\admin\UploadFileTrait;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    use CategoryTrait;
    use UploadFileTrait;

    public function index(Request $request)
    {
        $categories_select_box = Category::latest()->get();
        if ($request->has('type')){
            if ($categories = $this->filter($request)){
                $checkbox = [
                    'type'=>$request['type'],
                ];
                return view('admin.category.index',compact('categories','categories_select_box','checkbox'));
            }
        }else{
            $categories = Category::latest()->get();
            return view('admin.category.index',compact('categories','categories_select_box'));
        }
    }

    public function store(CategoryAdminRequest $request)
    {
        $img=$this->FileUploader($request['image'],'/Upload/image/category/');

        $ArrayData = $this->RequestsArray($request);
        $data = collect($ArrayData)->merge(['image'=>$img])->toArray();
        Category::create($data);

        return redirect(route('admin.category.index'))->with('success', 'اضافه شد');
    }

    public function update(CategoryAdminRequest $request, Category $category)
    {
        if ($this->check_has_parent_id($request)){
            return redirect(route('admin.category.index'))->with('error', 'خطا!! دوباره امتحان کنید');
        }

        if($request->hasFile('image')){
            $file = $request['image'];
            $this->UpdateImage($file,$category,'image');
        }

        $category->update(collect($this->RequestsArray($request))->toArray());

        return redirect(route('admin.category.index'))->with('success', 'تغیرات اعمال شد');
    }

    public function destroy(Category $category)
    {
//        if ($category->children()->count()){
//            return response()->json(['error' => true, 'message' => 'این دسته بندی اصلی است و دسته بندی های دیگری زیرمجموعه خود دارد ابتدا آن دسته بندی هارا حذف کنید']);
//        }
//        if ($category->courses()->count()){
//            return response()->json(['error' => true, 'message' => 'این دسته بندی دارای دوره است ابتدا آن ها را حذف کنید']);
//        }
//        if ($category->tools()->count()){
//            return response()->json(['error' => true, 'message' => 'این دسته بندی دارای ابزار است ابتدا آن ها را حذف کنید']);
//        }
        if ($category->articles()->count()){
            return response()->json(['error' => true, 'message' => 'این دسته بندی دارای مقاله است ابتدا آن ها را حذف کنید']);
        }
        if ($category->image != null){
            File::delete(public_path($category->image));
        }
        $category->delete();
        return response()->json(['success' => true, 'id' => $category->id]);
    }
}
