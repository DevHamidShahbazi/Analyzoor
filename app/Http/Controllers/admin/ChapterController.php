<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\admin\ChapterTrail;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    use ChapterTrail;

    public function index(Request $request)
    {
        $course_id = $request['course_id'];
        $course = Course::find($course_id);
        $chapters = $course->chapters()->orderBy('sort')->with('episodes')->get();
        return view('admin.course.chapter.index', compact('chapters', 'course_id', 'course'));
    }

    public function store(Request $request)
    {
        Chapter::create($this->RequestsArray($request));
        return redirect(route('admin.chapter.index',['course_id'=>$request['course_id']]))->with('success', 'اضافه شد');
    }

    public function update(Request $request, Chapter $chapter)
    {
        $chapter->update($this->RequestsArray($request));
        return redirect(route('admin.chapter.index',['course_id'=>$request['course_id'] ]))->with('success', 'ویرایش شد');
    }

    public function destroy(Request $request,Chapter $chapter)
    {
        $chapter->delete();
        return response()->json(['success' => true,'id' => $chapter['id']]);
    }
}
