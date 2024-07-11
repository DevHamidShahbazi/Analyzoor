<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Laravel\Prompts\form;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable= [
        'name', 'parent_id','image','slug', 'alt','type',
        'title', 'description', 'keywords'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }


    public function allDescendants()
    {
        $descendants = collect($this->children);

        foreach ($this->children as $child) {
            $descendants = $descendants->merge($child->allDescendants());
        }

        return $descendants;
    }

    public function allArticles()
    {
        $articles = $this->articles()->where('is_active','1')->get();

        foreach ($this->allDescendants() as $descendant) {
            $articles = $articles->merge($descendant->articles);
        }

        return $articles;
    }

    public function allParents()
    {
        $parents = $this->parent ? $this->parent->allParents() : collect();
        return $parents->push($this->parent)->filter();
    }

    public function getRootParent()
    {
        if ($this->parent) {
            return $this->parent->getRootParent();
        }

        return $this;
    }

    public function getAllParentArticles()
    {
        $articles = $this->parent ? $this->parent->getAllParentArticles() : collect();

        return $articles->merge($this->articles);
    }

    // Recursive method to get all categories from child to father
    public function getAllCategoriesFromChildToFather()
    {
        $categories = $this->parent ? $this->parent->getAllCategoriesFromChildToFather() : collect();

        return $categories->push($this);
    }
}
