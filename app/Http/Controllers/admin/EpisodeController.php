<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodeAdminRequest;
use App\Http\Traits\admin\EpisodeTrait;
use App\Models\Course;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class EpisodeController extends Controller
{
    use EpisodeTrait;
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

    public function store(EpisodeAdminRequest $request)
    {
        $episode = Episode::create($this->RequestsArray($request));

        $episode->update([
            'video'=>$request->hasFile('video') ? $this->storeFile($request,'video','courses/'.$request['course_id'].'/'.$episode->id) : null,
            'file'=>$request->hasFile('file') ? $this->storeFile($request,'file','courses/'.$request['course_id'].'/'.$episode->id) : null
        ]);

        return redirect()->back()->with('success','اضافه شد');
    }

    public function show(Episode $episode)
    {
        //
    }

    public function edit(Request $request,Episode $episode)
    {
        $course_id = $request['course_id'];
        $course = Course::find($course_id);
        return view('admin.course.episode.edit',compact('course_id','course','episode'));
    }

    public function update(EpisodeAdminRequest $request, Episode $episode)
    {
        $episode->update($this->RequestsArray($request));
        $this->updateFile($request,$episode,'video','courses/'.$request['course_id'].'/'.$episode->id);
        $this->updateFile($request,$episode,'file','courses/'.$request['course_id'].'/'.$episode->id);
        return redirect()->back()->with('success','ویرایش شد');
    }

    public function destroy(Episode $episode)
    {
        File::delete(storage_path('app/uploads/'.$episode->video));
        File::delete(storage_path('app/uploads/'.$episode->file));
        if ($episode->comments()->count()){
            $episode->comments()->delete();
        }
        $episode->delete();
        return response()->json(['success' => true, 'id' => $episode->id]);
    }

    public function video_show($episode_id)
    {
        $episode = Episode::find($episode_id);
        $path = storage_path('app/uploads/' . $episode->video);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }

    public function file_show($episode_id)
    {
        $episode = Episode::find($episode_id);
        $path = storage_path('app/uploads/' . $episode->file);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }
}
