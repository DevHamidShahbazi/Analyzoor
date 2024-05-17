<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Cart\facade\Cart;
use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Notifications\public\ActiveCodeNotification;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function verify_Show()
    {
        if (auth()->user()->verify == '0'){
            $cookie = request()->cookie('ActiveCode');
            if (!($cookie))
            {
                $this->SendCodeAndCreateCache();
            }
            return view('auth.verify');
        }
//        else{
//            if (count(Cart::all()) > 0){
//                return redirect()->route('basket.index');
//            }
            else{
                return redirect()->route('Panel');
            }
//        }
    }


    public function verify_code(Request $request)
    {
        if (auth()->check()){
            $this->validateCode($request);
            $code= $request['code'];
            $user = auth()->user();
            $checkVerifyCode = ActiveCode::CheckCodeVerify($user,$code);
            if ($checkVerifyCode == 'success'){
                $user->update([
                    'verify'=>'1'
                ]);
//                if (count(Cart::all()) > 0){
//                    return redirect()->route('basket.index');
//                }else{
                    return redirect()->route('Panel');
//                }
            }elseif($checkVerifyCode == 'expire'){
                return redirect()->back()->with('error','کد منقضی شده است');
            }elseif($checkVerifyCode == 'error'){
                return redirect()->back()->with('error','کد صحیح نیست');
            }
        }else{
            return redirect()->back()->with('error','خطا');
        }
        return redirect()->back()->with('error','خطا');
    }

    public function verify_again_code()
    {
        if ($this->checkCookieAgainCode()){
            return redirect()->back()->with('error','پیامک برای شما ارسال شده است لطفا صبور باشد');
        }
        $user = auth()->user();
        $code = ActiveCode::SendActiveCode($user);
        $user->notify(new ActiveCodeNotification($code,$user['phone']));

        return redirect()->back()->with('success','کد برای شما ارسال شد');
    }


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

    private function checkCookieAgainCode()
    {
        $CheckCookie = request()->cookie('ActiveCodeAgain');
        if (is_null($CheckCookie)){
            cookie()->queue('ActiveCodeAgain',1,1);
            return false;
        }
        return true;
    }

    private function SendCodeAndCreateCache(){
        cookie()->queue('AcCode',auth()->user()->phone,8);
        $user = auth()->user();
        $code = ActiveCode::SendActiveCode($user);
        $user->notify(new ActiveCodeNotification($code,$user['phone']));
    }
}
