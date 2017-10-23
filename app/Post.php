<?php

namespace App;


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
}
