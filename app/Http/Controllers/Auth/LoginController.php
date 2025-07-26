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
        // Check if user has product session, redirect to prepayment
        if (session('product')) {
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
