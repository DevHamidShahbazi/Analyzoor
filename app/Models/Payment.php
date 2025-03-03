<?php

namespace App\Models;

use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'user_id', 'course_id', 'result_number', 'status', 'result_message',
        ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
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
