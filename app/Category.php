<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{

    use Sluggable;

    public $timestamps = false;

    public function authors()
    {
        return $this->hasMany(Author::class);
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function sluggable()
    {

        return [
          'slug' => [
            'source' => 'title'
          ]
        ];
    }
}
