<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Shetabit\Visitor\Traits\Visitor;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,Visitor;

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


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function checkVerifyUser($user) {
        return !! $user->verify == '1';
    }

    public function activeCode()
    {
        return $this->hasMany(ActiveCode::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_user')->withTimestamps();
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function getCreatedDateAttribute()
    {
        return Verta::instance($this->attributes['created_at'])->format('Y-n-j');
    }
    public function getCreatedHourAttribute()
    {
        return Verta::instance($this->attributes['created_at'])->format('H:i');
    }
}
