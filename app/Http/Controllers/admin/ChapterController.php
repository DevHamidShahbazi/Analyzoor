<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index(Request $request)
    {
        $course_id = $request['course_id'];
        $course = Course::find($course_id);
        $chapters = $course->chapters()->orderBy('sort')->with('episodes')->get();
        return view('admin.course.chapter.index', compact('chapters', 'course_id', 'course'));
    }

    public function create(Request $request)
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Chapter $chapter)
    {
        //
    }

    public function edit(Request $request,Chapter $chapter)
    {
        //
    }

    public function update(Request $request, Chapter $chapter)
    {
        //
    }

    public function destroy(Request $request,Chapter $chapter)
    {
        //
    }
}
