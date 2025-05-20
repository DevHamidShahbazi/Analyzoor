<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EpisodeController extends Controller
{

    public function detail(Episode $episode)
    {
        $course = $episode->course;
        $episodes = $course->episodes()->get();
        return view('public.episode-detail',compact('episode','course','episodes'));
    }

    public function downloadVideo(Episode $episode)
    {
        // بررسی کنید که آیا کاربر مجوز دانلود این ویدیو را دارد یا خیر
        if ($this->userHasAccessToEpisode($episode)) {
            return Storage::download($episode->video, basename($episode->video));
        }

        return abort(403, 'شما مجوز دانلود این ویدیو را ندارید.');
    }

    private function userHasAccessToEpisode(Episode $episode)
    {
        // منطق شما برای بررسی دسترسی کاربر به اپیزود
        // برای ویدیو های رایگان فقط بررسی کنید که کاربر احراز هویت شده است
        if($episode->type == "free"){
            return auth()->check();
        }
        //برای ویدیو های پولی بررسی کنید که کاربر دوره را خریداری کرده است
        return auth()->check() && auth()->user()->purchases()->where('course_id', $episode->course_id)->exists();
    }
}
