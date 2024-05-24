<?php

use App\Models\User;
use Illuminate\Http\Request;

trait ResetPasswordWithPhone
{
    private function validateCode(Request $request){
        $request->validate([
            'code' => ['required',
            ],
            'captcha' => ['required', 'captcha'],
        ],[
            'captcha.captcha' => 'کد تایید شما اشتباه می باشد',
            'code.required' => 'کد را وارد کنید',
        ]);
    }


    private function validatePhone(Request $request)
    {
        $request->validate([
            'phone' => ['required','digits:11','regex:/^09(1[0-9]|9[0-2]|2[0-2]|0[1-5]|41|3[0,3,5-9])\d{7}$/'],
            'captcha' => ['required', 'captcha'],
        ],[
            'captcha.captcha' => 'کد تایید شما اشتباه می باشد',
            'phone.digits' => 'تعداد اعداد شماره موبایل اشتباه است',
            'phone.regex' => 'شماره موبایل اشتباه وارد شده است',
        ]);
    }

    private function CheckPhoneIsValid($phone)
    {
        return $user = User::wherePhone($phone)->first();
    }
}
