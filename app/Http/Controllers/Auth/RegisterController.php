<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Models\User;
use App\Notifications\public\ActiveCodeNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    public function register(Request $request)
    {

        $request->merge([
            'password' => convert_number_persian_to_english($request['password']),
            'password_confirmation' => convert_number_persian_to_english($request['password_confirmation'])
        ]);

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    protected function validator(array $data)
    {


        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required','digits:11',
                'regex:/^09(1[0-9]|9[0-2]|2[0-2]|0[1-5]|41|3[0,3,5-9])\d{7}$/',
                'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'captcha' => ['required', 'captcha'],
        ],[
            'phone.regex' => 'شماره موبایل صحیح وارد نشده است',
            'phone.digits' => ' شماره موبایل صحیح نیست',
            'captcha.captcha' => 'کد تایید شما اشتباه می باشد',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'level' => 'user',
            'password' => Hash::make($data['password']),
            'crypt' => Crypt::encrypt($data['password']),
        ]);
        cookie()->queue('ActiveCode',$data['phone'],8);
        $code = ActiveCode::SendActiveCode($user);
        $user->notify(new ActiveCodeNotification($code,$user['phone']));
        return $user;
    }
}
