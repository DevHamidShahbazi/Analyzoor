<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\admin\QuestionTrail;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    use QuestionTrail;

    public function index(Request $request)
    {
        $course_id = $request['course_id'];
        $course = Course::find($course_id);
        $questions = $course->questions()->get();
        return view('admin.course.question.index', compact('questions', 'course_id', 'course'));
    }

    public function store(Request $request)
    {
        Question::create($this->RequestsArray($request));
        return redirect(route('admin.question.index',['course_id'=>$request['course_id']]))->with('success', 'اضافه شد');
    }

    public function update(Request $request, Question $question)
    {
        $question->update($this->RequestsArray($request));
        return redirect(route('admin.question.index',['course_id'=>$request['course_id'] ]))->with('success', 'ویرایش شد');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return response()->json(['success' => true,'id' => $question['id']]);
    }
}
