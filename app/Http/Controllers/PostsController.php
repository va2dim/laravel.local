<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        //Carbon::setLocale('ru');
        $posts = Post::latest()->get(); // = Post::orderBy('created_at','desc')->get()
        //dd(compact('posts'));
        return view('posts.index', compact('posts'));

    }

    public function show(Post $post)
    //public function show($id)
    {
        //$post = Post::find($id);
        return view('posts.show', compact('post'));
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
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::create(request(['title', 'body']));

        return redirect('/');
    }
}
