<?php

namespace App\Http\Controllers\userPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function checkUser($id)
    {
        return !! $id == auth()->user()->id;
    }

    public function update(User $user,Request $request)
    {
        if (!$this->checkUser($user->id)){
            return redirect()->route('Panel')->with('error','اطلاعات وارد شده همخوانی ندارد');
        }
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
            $user->update([
                'password' => Hash::make($request['password']),
                'crypt' => Crypt::encrypt($request['password']),
            ]);
            return redirect(route('Panel'))->with('success', 'پسورد شما تغییر کرد');
        }

    }
}
