<?php

namespace App\Http\Traits\admin;

trait UrlTrait
{
    private function ArrayData($request)
    {
        return [
            'urlable_type'=>'0',
            'urlable_id'=>'0',
            'name'=>$request['name'],
            'url'=>$request['url'],
            'for_download'=> '1',
        ];
    }
}
