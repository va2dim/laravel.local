<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $timestamps = false;

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    public function category()
    {
        return $this->BelongsTo(Category::class)->withDefault();
    }
}
