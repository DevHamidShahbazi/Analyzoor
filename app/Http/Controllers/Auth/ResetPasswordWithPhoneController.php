<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Notifications\public\ActiveCodeNotification;
use Illuminate\Http\Request;
use ResetPasswordWithPhone;

class ResetPasswordWithPhoneController extends Controller
{
    use ResetPasswordWithPhone;

    public function showLinkRequestForm(): \Illuminate\Contracts\View\View
    {
        return view('auth.passwords.sms.sms');
    }

    public function showLinkRequestFormVerify()
    {
        if (\request()->session()->has('phone')){
            return view('auth.passwords.sms.verify');
        }
        return redirect(route('password.request.phone'));
    }


    public function passwordResetSmsSend(Request $request)
    {
        $this->validatePhone($request);
        $checkUser = $this->CheckPhoneIsValid($request['phone']);
        if ($checkUser){
            $code = ActiveCode::SendActiveCode($checkUser);
            \request()->session()->put('phone',$checkUser['phone']);
            $checkUser->notify(new ActiveCodeNotification($code,$checkUser['phone']));
            return redirect(route('password.verify.phone.show'))->with('success','کد برای شما ارسال شد');
        }else{
            return redirect()->back()->with('error','این شماره موبایل موجود نیست');
        }
    }


    public function passwordResetSmsVerify(Request $request)
    {
        if (!(\request()->session()->has('phone'))){
            return redirect(route('password.request.phone'));
        }
        $phone = \request()->session()->get('phone');
        $this->validateCode($request);

        $code= $request['code'];
        $user = $this->CheckPhoneIsValid($phone);
        $checkVerifyCode = ActiveCode::CheckCodeVerify($user,$code);

        if ($checkVerifyCode == 'success'){
            auth()->loginUsingId($user->id);
            \request()->session()->forget('phone');
            return redirect()->route('Home');
        }elseif($checkVerifyCode == 'expire'){
            return redirect()->back()->with('error','کد منقضی شده است');
        }else{
            return redirect()->back()->with('error','کد صحیح نیست');
        }
    }



}
