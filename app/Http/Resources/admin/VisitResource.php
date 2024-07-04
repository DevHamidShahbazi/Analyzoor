<?php

namespace App\Http\Resources\admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VisitResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'ip'=>$this->ip,
            'url'=>rawurldecode($this->url),
            'Create_Date'=>$this->Create_Date,
            'CreateHour'=>$this->CreateHour,
            'platform'=>$this->platform,
            'browser'=>$this->browser,
            'city'=>$this->city,
        ];
    }
}
