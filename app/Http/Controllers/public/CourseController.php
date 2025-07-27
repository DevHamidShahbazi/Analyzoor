<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoursePublicRequest;
use App\Http\Traits\pub\CommentTrait;
use App\Http\Traits\pub\TypeFilter;
use App\Http\Traits\pub\CategoryFilter;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Course;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CourseController extends Controller
{
    use CommentTrait;

    public function index(CoursePublicRequest $request)
    {
        $courses = QueryBuilder::for(Course::class)
            ->allowedFilters([
                AllowedFilter::exact('status'),
                AllowedFilter::custom('category_id', new CategoryFilter()),
                AllowedFilter::custom('type', new TypeFilter()),
                AllowedFilter::partial('name')->nullable(),
            ])
            ->paginate(20);

        $categories = Category::where('type','course')->get();
        return view('public.course.course',compact('courses','categories'));
    }

    public function detail(Course $course)
    {
        $episodes = $course->episodes()->get();
        $questions = $course->questions()->get();
        $chapters = $course->chapters()->get();
        
        // Check if user is enrolled in this course
        $isEnrolled = false;
        if (auth()->check()) {
            $isEnrolled = auth()->user()->courses()->where('course_id', $course->id)->exists();
        }
        
        return view('public.course.course-detail',compact('course','episodes','questions','chapters','isEnrolled'));
    }


    public function store_comment(Request $request)
    {
        $this->validate_store();
        $course = Course::find($request['commentable_id']);
        if(!$course) {
            return redirect()->back()->with('error', 'دوره ای پیدا نشد');
        }

        Comment::create([
            'commentable_id' => $request['commentable_id'],
            'commentable_type' => Course::class,
            'parent_id'=>'0',
            'is_active'=>'0',
            'user_id'=>auth()->user()->id,
            'comment'=>$request['comment']
        ]);

        return redirect(route('course.detail',$course->slug))->with('success','نظر شما با موفقیت ثبت شد بعد از تایید به نمایش گذاشته می شود');
    }

    public function result_comment(Request $request)
    {
        $this->validate_result();
        $course = Course::find($request['commentable_id']);

        if(!$course) {
            return redirect()->back()->with('error', 'دوره ای پیدا نشد');
        }

        Comment::create([
            'commentable_id' => $request['commentable_id'],
            'commentable_type' => Course::class,
            'parent_id'=>$request['parent_id'],
            'is_active'=>'0',
            'user_id'=>auth()->user()->id,
            'comment'=>$request['comment']
        ]);

        return redirect(route('course.detail',$course->slug))->with('success','نظر شما با موفقیت ثبت شد بعد از تایید به نمایش گذاشته می شود');
    }
}
