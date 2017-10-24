<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        //Carbon::setLocale('ru');
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();


        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get();
            //->toArray();
        //dd($archives);
        return view('posts.index', compact('posts', 'archives'));

    }

    public function show(Post $post)
    //public function show($id)
    {
        //$post = Post::find($id);
        //dd(bcrypt('213sks'));
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

        //auth()->user()->publish(new Post(request(['title','body'])));

         //Перенесли логику в user->publish(), т.к. там уже есть связь 'user_id' => auth()->user()->id,
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->user()->id,
        ]);


        return redirect('/');
    }
}
