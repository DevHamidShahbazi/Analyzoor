<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;


class SocialiteController extends Controller
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $GoogleUser = Socialite::driver('google')->user();
            $user = User::whereEmail($GoogleUser->email)->first();
            if ($user){
                auth()->loginUsingId($user->id,'on');
            }else{
                $str = Str::random(8);
                $newUser = User::create([
                    'name' => $GoogleUser->name,
                    'email' => $GoogleUser->email,
                    'phone' => null,
                    'level' => 'user',
                    'password' => Hash::make($str),
                    'crypt' => Crypt::encrypt($str),
                ]);
                auth()->loginUsingId($newUser->id,'on');
            }
            return redirect()->route('Home');
        }catch (\Exception $exception){
            return 'Error';
        }

    }
}
