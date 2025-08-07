<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'user_id',
        'expire_at',
    ];

    public $timestamps=false;


    public function scopeCreateActiveCode($query,$user)
    {
        if ($Checkcode = $this->CheckExpire($user)) {
            $code = $Checkcode->code;
        }else{
            do {
                $code = mt_rand(10000,99999);
            }while($this->CheckIsUnique($user ,$code));

            $user->activeCode()->create([
                'code' => $code,
                'expire_at' => now()->addMinutes(10),
            ]);
        }


        return $code;
    }

    private function CheckIsUnique($user, $code): bool
    {
        return !! $user->activeCode()->whereCode($code)->first();
    }

    private function CheckExpire($user)
    {
        return $user->activeCode()->where('expire_at','>',now())->first();
    }



    public function scopeSendCodeVerify($query,$user)
    {
        $this->removeDuplicates($user);
        return $this->CreateActiveCode($user);
    }


    public function scopeSendActiveCode($query,$user)
    {
        $this->removeDuplicates($user);
        return $this->CreateActiveCode($user);
    }

    private function removeDuplicates($user)
    {
        if ($user->activeCode()->where('expire_at','<=',now())->first()){
            $user->activeCode()->delete();
        }
    }


    public function scopeCheckCodeVerify($query, $user,$code)
    {
        $checkCode = $user->activeCode()->whereCode($code)->first();
        if ($checkCode){
            $checkExpire = $user->activeCode()->whereCode($code)->where('expire_at','>',now())->first();
            if ($checkExpire){
                $checkExpire->delete();
                return 'success';
            }
            $checkCode->delete();
            return 'expire';
        }
        return 'error';
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

