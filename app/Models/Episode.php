<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'slug', 'time', 'name', 'title','course_id',
        'description', 'keywords', 'body','type','video','file'
    ];

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
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
