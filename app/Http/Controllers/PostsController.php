<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
