<?php

namespace App;


use Carbon\Carbon;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function AddComment($body)
    {
/*
        Comment::create([
            'body' => $body,
            'post_id' => $this->id,
        ]);
*/
        //Eloquent have relationship - give you post_id, we can rewrite this more simple
        $this->comments()->create(compact('body'));
    }

    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }
}
