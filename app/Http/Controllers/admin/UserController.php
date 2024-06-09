<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\admin\UserTrait;
use App\Models\User;
use App\Notifications\CreateUserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    use UserTrait;

    public function index(Request $request)
    {
        if ($request->has('status')){
            if ($users = $this->filter($request)){
                $checkbox = [
                    'status'=>$request['status'],
                ];
                return view('admin.user.index',compact('users','checkbox'));
            }
        }else{
            $users = User::latest()->get();
            return view('admin.user.index',compact('users'));
        }
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'level' => $request['level'],
            'verify' => $request['verify'],
            'password' => Hash::make($request['password']),
            'crypt' => Crypt::encrypt($request['password']),
        ]);

        if ($request->has('sendCode')){
            $user->notify(new CreateUserNotification($request['phone'],$request['password']));
        }
        return redirect()->back()->with('success','تغییرات اعمال شد');
    }


    public function update(Request $request, User $user)
    {
        $this->validate(request(),[
            'name' => ['required'],
            'verify' => ['required'],
            'level' => ['required'],
        ]);

        $user->update([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'verify' => $request['verify'],
            'level' => $request['level'],
            'password' => Hash::make($request['password']),
            'crypt' => Crypt::encrypt($request['password']),
        ]);
        return redirect()->back()->with('success','تغییرات اعمال شد');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['success' => true, 'id' => $user['id']]);
    }
}
