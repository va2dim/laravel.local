<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {

     //   $posts = Post::all();
        //return view('post.index', compact('post'));
        return view('posts.index');
    }

    //public function show(Post $post)
    public function show()
    {

        //   $posts = Post::all();
        //return view('posts.show', compact('post'));
        return view('posts.show');
    }

    public function create()
    {

        return view('posts.create');
    }

    public function store()
    {
        /*
                $post = new Post;
                $post->title = request('title');
                $post->save();
        Или
         */
        Post::create(request(['title', 'body']));

        return redirect('/');
    }
}
