<?php

namespace App\Http\Traits\admin;

use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;


trait UserTrait
{
    private function filter($request)
    {
        $all = collect([]);
        $status = $request['status'];

        $query = User::query();
        $query->when($status, function ($qu) use ($status) {
            $qu->where('level', $status)->latest();
        });

        $all [] = $query->latest()->get();

        return $all->collapse();
    }

    private function arrayRequest($request) : array
    {
        $data = [
            'name' => $request['name'],
            'phone' => $request['phone'],
            'level' => $request['level'],
            'verify' => $request['verify'],
        ];

        // Handle email field - only include if not empty
        if ($request->has('email') && !empty($request['email'])) {
            $data['email'] = $request['email'];
        } else {
            $data['email'] = null;
        }

        // فقط اگر password تغییر کرده باشد، آن را hash کن
        if ($request->has('password') && !empty($request['password'])) {
            $data['password'] = Hash::make($request['password']);
            $data['crypt'] = Crypt::encrypt($request['password']);
        }

        return $data;
    }

    private function syncUserCourses($user, $courseIds)
    {
        if (is_array($courseIds)) {
            $user->courses()->sync($courseIds);
        }
    }

    private function getCoursesForSelect()
    {
        return \App\Models\Course::select('id', 'name', 'type', 'status')
            ->where('status', '!=', 'comingSoon')
            ->orderBy('name')
            ->get();
    }

    private function getUserSelectedCourses($user)
    {
        return $user->courses()->pluck('course_id')->toArray();
    }
}
