<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable =[
        'name','title','keywords','alt'
        ,'category_id','is_active', 'body',
        'image','description',
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

    public function files()
    {
        return $this->morphMany(File::class,'fileable');
    }

//    public function comments()
//    {
//        return $this->hasMany(Comment::class);
//    }
}
