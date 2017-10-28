<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{

    public function author()
    {
        return $this->BelongsTo(Author::class)->withDefault();
    }

    public function category()
    {
        return $this->BelongsTo(Category::class)->withDefault();
    }

    public function source()
    {
        return $this->belongsTo(Source::class)->withDefault();
    }
}
