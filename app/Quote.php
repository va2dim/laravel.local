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


    public function scopeFilter($query, $filters)
    {
        if(!empty($filters)) {
            if (!empty($filters['author'])) {
                $query->where('author_id', '=', $filters['author']);
            }

            if (!empty($filters['source'])) {
                $query->where('source_id', '=', $filters['source']);
            }

            if (!empty($filters['publicate_at'])) {
                //$query->whereYear('publicate_at', $date);
            }
        }
    }
}
