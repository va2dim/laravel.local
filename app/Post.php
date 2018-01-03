<?php

namespace App;


use Carbon\Carbon;

class Post extends Model
{


    public static function archives()
    {
        $dt = static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get();
            //->toArray();

        return $dt;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function AddComment($user_id, $body)
    {
/*
        Comment::create([
            'body' => $body,
            'post_id' => $this->id,
        ]);
*/
        //Eloquent have relationship - give you post_id, we can rewrite this more simple
        $this->comments()->create(compact('user_id', 'body'));
    }

    public function scopeFilter($query, $filters)
    {
        if(!empty($filters)) {
            if ($month = $filters['month']) {

                $query->whereMonth('created_at', Carbon::parse($month)->month);
            }

            if ($year = $filters['year']) {
                $query->whereYear('created_at', $year);
            }
        }
    }
}
