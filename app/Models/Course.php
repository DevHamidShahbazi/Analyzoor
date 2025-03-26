<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'slug', 'category_id', 'name', 'status', 'title',
        'description', 'keywords', 'body', 'alt', 'image','type','price','discount'
    ];

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function payments()
    {
        return $this->belongsTo(Payment::class);
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
