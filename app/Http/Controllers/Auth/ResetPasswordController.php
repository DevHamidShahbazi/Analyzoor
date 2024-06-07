<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    public function selectType()
    {
        return view('auth.passwords.select-type');
    }

    protected function resetPassword($user, $password)
    {
        $user->update([
            'password' => Hash::make(convert_number_persian_to_english($password)),
            'crypt' => Crypt::encrypt(convert_number_persian_to_english($password)),
        ]);

        event(new PasswordReset($user));

        $this->guard()->login($user);
    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed'],
        ];
    }


    protected function setUserPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->crypt = Crypt::encrypt($password);
    }
}
