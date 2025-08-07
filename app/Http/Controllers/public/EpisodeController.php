<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Http\Traits\pub\CommentTrait;
use App\Models\Comment;
use App\Models\Episode;
use App\Models\DownloadToken;
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

    /**
     * Generate secure download token for video
     */
    public function generateVideoDownloadToken(Episode $episode)
    {
        // Check if user has access to this episode
        if (!$this->userHasAccessToEpisode($episode)) {
            return response()->json([
                'success' => false,
                'message' => 'شما مجوز دانلود این ویدیو را ندارید'
            ], 403);
        }

        // Check if video exists
        if (!$episode->hasVideoFile()) {
            return response()->json([
                'success' => false,
                'message' => 'فایل ویدیو موجود نیست'
            ], 404);
        }

        // Generate secure download token (expired tokens will be cleaned up automatically)
        $token = DownloadToken::generateToken(
            auth()->id(),
            $episode->id,
            'video',
            2 // 2 hours expiration
        );

        return response()->json([
            'success' => true,
            'download_url' => route('episode.secure.download', $token->token)
        ]);
    }

    /**
     * Generate secure download token for file
     */
    public function generateFileDownloadToken(Episode $episode)
    {
        // Check if user has access to this episode
        if (!$this->userHasAccessToEpisode($episode)) {
            return response()->json([
                'success' => false,
                'message' => 'شما مجوز دانلود این فایل را ندارید'
            ], 403);
        }

        // Check if file exists
        if (!$episode->hasFile()) {
            return response()->json([
                'success' => false,
                'message' => 'فایل آموزشی موجود نیست'
            ], 404);
        }

        // Generate secure download token (expired tokens will be cleaned up automatically)
        $token = DownloadToken::generateToken(
            auth()->id(),
            $episode->id,
            'file',
            2 // 2 hours expiration
        );

        return response()->json([
            'success' => true,
            'download_url' => route('episode.secure.download', $token->token)
        ]);
    }

    /**
     * Secure download using token
     */
    public function secureDownload($token)
    {
        // Find the token
        $downloadToken = DownloadToken::where('token', $token)->first();

        if (!$downloadToken) {
            abort(404, 'لینک دانلود نامعتبر است');
        }

        // Check if token is valid
        if (!$downloadToken->isValid()) {
            abort(403, 'لینک دانلود منقضی شده یا قبلاً استفاده شده است');
        }

        // Check if user is authenticated and matches token
        if (!auth()->check() || auth()->id() !== $downloadToken->user_id) {
            abort(403, 'شما مجوز دانلود این فایل را ندارید');
        }

        // Additional security: Check if IP matches (optional, can be disabled for mobile users)
        // if (!$downloadToken->isFromSameIp()) {
        //     abort(403, 'دسترسی از آدرس IP متفاوت غیرمجاز است');
        // }

        // Get file path
        $filePath = $downloadToken->getFilePath();

        if (!$filePath) {
            abort(404, 'فایل مورد نظر یافت نشد');
        }

        // Check if file exists in storage
        $fullPath = storage_path('app/uploads/' . $filePath);
        if (!file_exists($fullPath)) {
            abort(404, 'فایل در سرور موجود نیست');
        }

        // Mark token as used
        $downloadToken->markAsUsed();

        // Return file download
        return response()->download($fullPath, $downloadToken->getFileName());
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

    private function userHasAccessToEpisode(Episode $episode)
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return false;
        }

        // Check if course is free
        if ($episode->course->type === 'free') {
            return true;
        }

        // Check if user is enrolled in the course
        return auth()->user()->courses()->where('course_id', $episode->course_id)->exists();
    }
}
