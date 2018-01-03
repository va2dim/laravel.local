<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;


class CommentsController extends Controller
{


    public function store(Post $post)
    {
        //dd($_REQUEST);
        $this->validate(request(), [
            'body' => 'required|min:2',
        ]);

        $post->addComment(request('user_id'), request('body'));

        //return redirect('/post/'.$this->post->id); // or in a simple way
        return back();
    }
}
