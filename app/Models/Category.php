<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable= [
        'name', 'parent_id','image','slug', 'alt','type',
        'title', 'description', 'keywords'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }



//    public function courses()
//    {
//        return $this->hasMany(Course::class);
//    }
//
//    public function tools()
//    {
//        return $this->hasMany(Tool::class);
//    }
//
//    public function articles()
//    {
//        return $this->hasMany(Article::class);
//    }
}
