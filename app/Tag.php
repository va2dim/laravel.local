<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{

    use Sluggable;

    public $timestamps = false;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
        //return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id'); что даст указание доп параметров?
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function sluggable()
    {

        return [
          'slug' => [
            'source' => 'name'
          ]
        ];
    }

}
