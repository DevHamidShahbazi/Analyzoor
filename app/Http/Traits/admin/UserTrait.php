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
        return [
            'name' => $request['name'],
            'phone' => $request['phone'],
            'level' => $request['level'],
            'email' => $request['email'],
            'verify' => $request['verify'],
            'password' => Hash::make($request['password']),
            'crypt' => Crypt::encrypt($request['password']),
        ];
    }
}
