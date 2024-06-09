<?php

namespace App\Http\Traits\admin;

use App\Models\User;


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
}
