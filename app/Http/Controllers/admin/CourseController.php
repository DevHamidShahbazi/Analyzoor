<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseAdminRequest;
use App\Http\Traits\admin\CourseTrait;
use App\Http\Traits\admin\UploadFileTrait;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    use UploadFileTrait;
    use CourseTrait;

    public function index(Request $request)
    {
        $query = Course::query();

        if ($request->has('user_id')) {
            $userId = $request->user_id;
            $query->whereHas('users', function($q) use ($userId) {
                $q->where('user_id', $userId);
            });
        }

        $courses = $query->latest()->get();
        return view('admin.course.index',compact('courses'));
    }

    public function create()
    {
        return view('admin.course.create');
    }

    public function store(CourseAdminRequest $request)
    {
        $file = $request['image'];
        $img=$this->FileUploader($file,'/Upload/image/course/');

        $ArrayData = $this->RequestsArray($request);
        $data = collect($ArrayData)->merge(['image'=>$img])->toArray();
        Course::create($data);

        return redirect(route('admin.course.create'))->with('success', 'دوره با موفقیت اضافه شد');
    }

    public function show(Course $course)
    {
        //
    }

    public function edit(Course $course)
    {
        return view('admin.course.edit',compact('course'));
    }

    public function update(CourseAdminRequest $request, Course $course)
    {
        if($request->hasFile('image')){
            $file = $request['image'];
            $this->UpdateImage($file,$course);
        }
        $course->update(collect($this->RequestsArray($request))->toArray());
        return redirect()->back()->with('success', 'تغیرات اعمال شد');
    }

    public function destroy(Course $course)
    {
        if ($course->episodes()->count()){
            return response()->json(['error' => true, 'message' => 'این دوره دارای ویدیو است ابتدا آن ها را حذف کنید']);
        }

        if ($course->payments()->count()){
            return response()->json(['error' => true, 'message' => 'این دوره دارای پرداخت است ابتدا آن ها را حذف کنید']);
        }

        if ($course->comments()->count()){
            $course->comments()->delete();
        }
        File::delete(public_path($course->image));
        $course->delete();
        return response()->json(['success' => true, 'id' => $course->id]);
    }
}
