<?php

namespace App\Http\Traits\admin;

trait MenuTrait
{
    private function ArrayData($request)
    {
        return [
            'sort'=>$request['sort'],
            'name'=>$request['name'],
            'url'=>$request['url'],
        ];
    }
}
