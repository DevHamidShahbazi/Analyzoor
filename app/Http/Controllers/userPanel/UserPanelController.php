<?php

namespace App\Http\Controllers\userPanel;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Notifications\public\ActiveCodeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserPanelController extends Controller
{
    public function index()
    {
        return view('user-panel.dashboard');
    }

    public function update_profile(Request $request)
    {
        $user = auth()->user();

        $this->validate(request(),[
            'name' => ['string', 'max:255'],
        ]);

        $user->update([
           'name'=>$request['name']
        ]);

        if($user->phone != $request['phone']) {
            $this->validate(request(),[
                'phone' => ['digits:11','required',
                    'regex:/^09(1[0-9]|9[0-2]|2[0-2]|0[1-5]|41|3[0,3,5-9])\d{7}$/',
                    ' unique:users,phone,'.$user->id],
            ],[
                'phone.regex' => 'شماره موبایل صحیح وارد نشده است',
                'phone.digits' => ' شماره موبایل صحیح نیست',
            ]);

            $user->update([
                'phone' => $request['phone'],
                'verify' => '0',
            ]);

            cookie()->queue('ActiveCode',$request['phone'],8);
            $code = ActiveCode::SendActiveCode($user);
            $user->notify(new ActiveCodeNotification($code,$user['phone']));
            return redirect()->route('verify.show')->with('success','کد تایید برای شما ارسال شد');
        }

        return redirect()->back()->with('success','تغییرات اعمال شد');
    }

    public function update_password(Request $request)
    {
        $this->validate(request(),[
            'password' => ['required', 'string', 'min:4']
        ]);
        $request->merge([
            'password' => convert_number_persian_to_english($request['password']),
            'password_confirmation' => convert_number_persian_to_english($request['password_confirmation'])
        ]);

        if (!($request['password'] === $request['password_confirmation'])){
            return redirect(route('Panel'))->with('error', 'پسورد تایید اشتباه می باشد');
        }else{
            auth()->user()->update([
                'password' => Hash::make($request['password']),
                'crypt' => Crypt::encrypt($request['password']),
            ]);
            return redirect(route('user-panel.dashboard'))->with('success', 'پسورد شما تغییر کرد');
        }
    }
}
