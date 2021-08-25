<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory,Sluggable;
    protected $table = 'categories';

    protected $fillable = ['title','name','parent_id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public  function  subCategory()
    {
        return $this->HasMany(Category::class,'parent_id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function samples()
    {
        return $this->belongsToMany(Sample::class);
    }

    public function courses()
    {
        return $this->belongsToMany(TrainingCourse::class);
    }

}
