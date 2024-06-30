<?php

namespace App\Models;

use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'body','phone','name'
    ];
    public function getCreateDateAttribute()
    {
        return Verta::instance($this->created_at)->format('Y/n/j');
    }
    public function getCreateHourAttribute()
    {
        return Verta::instance($this->created_at)->format('H:i');
    }
}
