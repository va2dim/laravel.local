<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Validation\Rule;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);

    }

    public function index()
    {
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->simplePaginate(7);
//        dd($posts);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {

        return view('posts.show', compact('post'));
    }

    public function update(Post $post)
    {
        if (!isset($post)) {
            if (auth()->user()->name == $post->user->name) {
                return view('posts.update', compact('post'));
            } else {
                //echo 'У вас нет прав для редактирования этого поста (только создатель может это делать)';
                return redirect()->back();
            }
        } else {
            return view('posts.update', compact('post'));
        }

    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
        ]);



        //$images = \Input::file('image');


        //auth()->user()->publish(new Post(request(['title','body'])));
        //Перенесли логику в user->publish(), т.к. там уже есть связь 'user_id' => auth()->user()->id,

        // Обработка ошибки превышения размера файла
        //$files = $request->file('images');
        $files = app('request')->file('images');
        foreach ($files as $file){
            if ($file->getError()) {
                dd($file->getErrorMessage());
            }
        }
        //dd($request->all());
        //dd($request->file('images'));

//TODO вынести в public function fileUpload(Request $request)

        if ($request->hasFile('images')) {
//dd($files);
            $validator = Validator::make(compact('files'), [
              'files' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            //$valid = app('validator')->make(compact('files'),['files'=>'required']);

            //$validator->each($files, 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048');
            //$validator->passes();

            $destinationPath = public_path('/images');
            //$images[] = $destinationPath;
            foreach ($files as $file) {
                $images[] = time() . '_' . $file->getClientOriginalName();
                $file->move($destinationPath, last($images));
            }

            //$path = $request->images->store('images', 's3');
            //$images_arr = serialize($images);
        }

        Post::updateOrCreate([
          'id' => request('id'),
        ], [
          'user_id' => auth()->user()->id,
          'title' => request('title'),
          'body' => request('body'),
          'images' => serialize($images),
        ]);

        return redirect('/');
    }

    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        return redirect('/');
    }
}
