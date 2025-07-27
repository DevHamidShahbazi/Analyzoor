<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Http\Traits\pub\CommentTrait;
use App\Models\Comment;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EpisodeController extends Controller
{
    use CommentTrait;

    public function detail(Episode $episode)
    {
        $course = $episode->course;
        $episodes = $course->episodes()->get();

        // Check if user is enrolled in this course
        $isEnrolled = false;
        if (auth()->check()) {
            $isEnrolled = auth()->user()->courses()->where('course_id', $course->id)->exists();
        }

        return view('public.episode.episode-detail',compact('episode','course','episodes','isEnrolled'));
    }

    public function store_comment(Request $request)
    {
        $this->validate_store();
        $episode = Episode::find($request['commentable_id']);
        if(!$episode) {
            return redirect()->back()->with('error', 'اپیزودی پیدا نشد');
        }

        Comment::create([
            'commentable_id' => $request['commentable_id'],
            'commentable_type' => Episode::class,
            'parent_id'=>'0',
            'is_active'=>'0',
            'user_id'=>auth()->user()->id,
            'comment'=>$request['comment']
        ]);

        return redirect(route('episode.detail',$episode->slug))->with('success','نظر شما با موفقیت ثبت شد بعد از تایید به نمایش گذاشته می شود');
    }

    public function result_comment(Request $request)
    {
        $this->validate_result();
        $episode = Episode::find($request['commentable_id']);

        if(!$episode) {
            return redirect()->back()->with('error', 'اپیزودی پیدا نشد');
        }

        Comment::create([
            'commentable_id' => $request['commentable_id'],
            'commentable_type' => Episode::class,
            'parent_id'=>$request['parent_id'],
            'is_active'=>'0',
            'user_id'=>auth()->user()->id,
            'comment'=>$request['comment']
        ]);

        return redirect(route('episode.detail',$episode->slug))->with('success','نظر شما با موفقیت ثبت شد بعد از تایید به نمایش گذاشته می شود');
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
        return auth()->check() && auth()->user()->courses()->where('course_id', $episode->course_id)->exists();
    }
}
