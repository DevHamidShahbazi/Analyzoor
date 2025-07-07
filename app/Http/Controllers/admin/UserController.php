<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAdminRequest;
use App\Http\Traits\admin\UserTrait;
use App\Models\User;
use App\Notifications\CreateUserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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
            $users = User::with('courses')->latest()->get();
            return view('admin.user.index',compact('users'));
        }
    }

    public function store(UserAdminRequest $request)
    {
        $user = User::create($this->arrayRequest($request));

        // اضافه کردن دوره‌ها
        if ($request->has('courses')) {
            $this->syncUserCourses($user, $request->courses);
        }

        if ($request->has('sendCode')){
            $user->notify(new CreateUserNotification($request['phone'],$request['password']));
        }
        return redirect()->back()->with('success','تغییرات اعمال شد');
    }


    public function update(UserAdminRequest $request, User $user)
    {
        $user->update($this->arrayRequest($request));

        // بروزرسانی دوره‌ها
        if ($request->has('courses')) {
            $this->syncUserCourses($user, $request->courses);
        }

        return redirect()->back()->with('success','تغییرات اعمال شد');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['success' => true, 'id' => $user['id']]);
    }
}
