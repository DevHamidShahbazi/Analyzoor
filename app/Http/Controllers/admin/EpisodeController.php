<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodeAdminRequest;
use App\Http\Traits\admin\EpisodeTrait;
use App\Models\Course;
use App\Models\Episode;
use App\Jobs\ProcessVideoJob;
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

        // Handle chunked uploads
        $videoPath = null;
        $filePath = null;

        // Handle video upload
        if ($request->filled('video_path') && $request->input('video_is_new') == '1') {
            $videoPath = $this->moveChunkedFile($request->input('video_path'), 'courses/'.$request['course_id'].'/'.$episode->id);
        } elseif ($request->hasFile('video')) {
            // Fallback to traditional upload
            $videoPath = $this->storeFile($request, 'video', 'courses/'.$request['course_id'].'/'.$episode->id);
        }

        // Handle file upload
        if ($request->filled('file_path') && $request->input('file_is_new') == '1') {
            $filePath = $this->moveChunkedFile($request->input('file_path'), 'courses/'.$request['course_id'].'/'.$episode->id);
        } elseif ($request->hasFile('file')) {
            // Fallback to traditional upload
            $filePath = $this->storeFile($request, 'file', 'courses/'.$request['course_id'].'/'.$episode->id);
        }

        $episode->update([
            'video' => $videoPath,
            'file' => $filePath
        ]);

        // Dispatch video processing job if video was uploaded
        if ($videoPath) {
            ProcessVideoJob::dispatch($episode, $videoPath);
        }

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

        // Handle chunked uploads for video
        $newVideoPath = null;
        if ($request->filled('video_path') && $request->input('video_is_new') == '1') {
            // Delete old video if exists
            if ($episode->video) {
                File::delete(storage_path('app/uploads/'.$episode->video));
            }
            // Move new chunked video
            $newVideoPath = $this->moveChunkedFile($request->input('video_path'), 'courses/'.$request['course_id'].'/'.$episode->id);
            $episode->update(['video' => $newVideoPath]);
        } elseif ($request->hasFile('video')) {
            // Fallback to traditional upload
            $this->updateFile($request, $episode, 'video', 'courses/'.$request['course_id'].'/'.$episode->id);
            $newVideoPath = $episode->video;
        }

        // Handle chunked uploads for file
        if ($request->filled('file_path') && $request->input('file_is_new') == '1') {
            // Delete old file if exists
            if ($episode->file) {
                File::delete(storage_path('app/uploads/'.$episode->file));
            }
            // Move new chunked file
            $filePath = $this->moveChunkedFile($request->input('file_path'), 'courses/'.$request['course_id'].'/'.$episode->id);
            $episode->update(['file' => $filePath]);
        } elseif ($request->hasFile('file')) {
            // Fallback to traditional upload
            $this->updateFile($request, $episode, 'file', 'courses/'.$request['course_id'].'/'.$episode->id);
        } elseif ($request->input('file_delete') == '1') {
            // Delete existing file
            if ($episode->file) {
                File::delete(storage_path('app/uploads/'.$episode->file));
            }
            $episode->update(['file' => null]);
        }

        // Dispatch video processing job if video was uploaded/updated
        if ($newVideoPath) {
            ProcessVideoJob::dispatch($episode, $newVideoPath);
        }

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
        
        if (!$episode || !$episode->hasVideoFile()) {
            abort(404, 'فایل ویدیو یافت نشد');
        }

        $path = storage_path('app/uploads/' . $episode->video);
        return response()->file($path);
    }

    public function file_show($episode_id)
    {
        $episode = Episode::find($episode_id);
        
        if (!$episode || !$episode->hasFile()) {
            abort(404, 'فایل آموزشی یافت نشد');
        }

        $path = storage_path('app/uploads/' . $episode->file);
        return response()->file($path);
    }

    /**
     * Move chunked file from temp location to final location
     */
    private function moveChunkedFile($tempPath, $finalDirectory)
    {
        $tempFullPath = storage_path('app/uploads/' . $tempPath);

        if (!File::exists($tempFullPath)) {
            return null;
        }

        // Create final directory if it doesn't exist
        $finalDir = storage_path('app/uploads/' . $finalDirectory);
        if (!File::exists($finalDir)) {
            File::makeDirectory($finalDir, 0755, true);
        }

        // Generate final filename
        $filename = basename($tempPath);
        $finalPath = $finalDirectory . '/' . $filename;
        $finalFullPath = storage_path('app/uploads/' . $finalPath);

        // Move file from temp to final location
        File::move($tempFullPath, $finalFullPath);

        return $finalPath;
    }
}
