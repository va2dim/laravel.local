<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Source extends Model
{

    public $timestamps = false;

    public function category()
    {
        return $this->BelongsTo(Category::class)->withDefault();
    }
}
