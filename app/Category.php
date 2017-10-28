<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function authors()
    {
        return $this->hasMany(Author::class);
    }

    public function quotes()
    {
        return $this->hasMany(Author::class);
    }
}
