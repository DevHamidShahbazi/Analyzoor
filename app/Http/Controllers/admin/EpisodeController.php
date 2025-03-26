<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{

    public function index(Request $request)
    {
        $course_id = $request['course_id'];
        $course = Course::find($course_id);
        $episodes = $course->episodes()->get();
        return view('admin.course.episode.index',compact('episodes','course_id','course'));
    }

    public function create(Request $request)
    {
        $course_id = $request['course_id'];
        $course = Course::find($course_id);
        return view('admin.course.episode.create',compact('course_id','course'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function show(Episode $episode)
    {
        //
    }

    public function edit(Episode $episode)
    {
        //
    }

    public function update(Request $request, Episode $episode)
    {
        //
    }

    public function destroy(Episode $episode)
    {
        //
    }
}
