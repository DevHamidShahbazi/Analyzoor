<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;
    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUser();
        $this->redirectTo = url()->previous();
    }

    protected function validateLogin(Request $request)
    {
        $request->merge([
            'password' => convert_number_persian_to_english($request['password'])
        ]);

        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function credentials(Request $request)
    {
        $this->validate(request(),[
            'captcha' => ['required', 'captcha'],
        ],[
            'captcha.captcha' => 'کد تایید شما اشتباه می باشد',
        ]);
        return $request->only($this->username(), 'password');
    }

    public function findUser()
    {
        $requestUserName = request()->input('username');
        $fieldType = filter_var($requestUserName, FILTER_VALIDATE_EMAIL) ? 'email':'phone';
        \request()->merge([$fieldType => $requestUserName]);
        return $fieldType;
    }

    public function redirectPath()
    {
        // Check if user has product session
        if (session('product')) {
            $courseId = session('product');
            $course = \App\Models\Course::find($courseId);
            
            // If course is free, enroll user directly and redirect back
            if ($course && $course->type !== 'premium') {
                // Check if user already has this course
                if (auth()->user()->courses()->where('course_id', $courseId)->exists()) {
                    session()->forget('product');
                    return redirect()->back()->with('success', 'شما قبلا در این دوره ثبت نام کرده‌اید');
                }
                
                // Add course to user
                auth()->user()->courses()->attach($courseId);
                
                // Clear session
                session()->forget('product');
                
                // Redirect to intended URL or course detail
                $intendedUrl = session('intended_url');
                session()->forget('intended_url');
                
                if ($intendedUrl) {
                    return $intendedUrl;
                }
                
                return route('course.detail', $course->slug);
            }
            
            // For premium courses, redirect to pre-payment
            return route('payment.pre-payment');
        }

        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : RouteServiceProvider::HOME;
    }

    public function username()
    {
        return $this->username;
    }

}
