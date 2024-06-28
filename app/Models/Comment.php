<?php

namespace App\Models;

use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=[
        'commentable_id','parent_id','user_id',
        'comment', 'commentable_type','is_active'
    ];

    public function commentable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function getCreateDateAttribute()
    {
        return Verta::instance($this->created_at)->format('Y/n/j');
    }
    public function getCreateHourAttribute()
    {
        return Verta::instance($this->created_at)->format('H:i');
    }
}
