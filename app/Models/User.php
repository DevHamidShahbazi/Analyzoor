<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'crypt', 'level', 'verify', 'image',
    ];

    protected $visible = [ 'name', 'email', 'phone','level', 'verify', 'image'];

    protected $hidden = [
        'email_verified_at',
        'password',
        'crypt',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function activeCode()
    {
        return $this->hasMany(ActiveCode::class);
    }

}
