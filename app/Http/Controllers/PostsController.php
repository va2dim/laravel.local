<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Validation\Rule;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);

    }

    public function index()
    {
/*
        $parent_id = [null, 2];
        dd(array_random($parent_id));
*/

        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->simplePaginate(5);
//        dd($posts);
        return view('posts.index', compact('posts'));
    }

    public function show($post_slug)
    {
        $post = Post::where('slug', $post_slug)->first();
        $post_comments = $post->showComments();

        //dd($post->comments);
        //dd($comments);

        return view('posts.show', compact('post', 'post_comments'));
    }

    public function update($post_slug)
    {
        $post = Post::where('slug', $post_slug)->first();

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

//dd($request);

        //$images = \Input::file('image');
        //auth()->user()->publish(new Post(request(['title','body'])));
        //Перенесли логику в user->publish(), т.к. там уже есть связь 'user_id' => auth()->user()->id,

        // Обработка ошибки превышения размера файла upload_max_filesize php.ini directive (default limit is 2048 KiB).
        $files = $request->file('images');

        //dd($files);
        foreach ($files as $file){
            if ($file->getError()) {
                return redirect()->back()->withErrors($file->getErrorMessage());
            }
        }


//TODO вынести в public function fileUpload(Request $request)

        if ($request->hasFile('images')) {



            /*
            $validator = Validator::make(compact('files'), [
              'files' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
            */
            //$validator->each($files, 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048');

            $validator = Validator::make(compact('files'), [
              'files' => 'required|array'
            ]);

            foreach($files as $file) {
                $validator = Validator::make(compact('file'), [
                  'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator);
                }
            }
//TODO Если первый файл прошел валидацию обновить модель

            if ($old_images = Post::find(request('id'))->images) {
                foreach (unserialize($old_images) as $old_image) { // проверка на существование файла
                    if (file_exists(public_path('images/'.$old_image))) {
                        unlink(public_path('images/' . $old_image)); // При upload устанавливается simlink?
                        Storage::delete(public_path('images/' . $old_image)); // TODO не отрабатывает удаление файла, удалить сразу массив imgs, это же добавить в удаление поста
                    }
                }
            }

            foreach ($files as $file) {
                $file_name = $file->getClientOriginalName();
                $file_name = substr($file_name, 0, strpos($file_name, '.', -4));
                $slug = SlugService::createSlug(\App\Post::class, 'slug', $file_name);
                $images[] = time() . '_' . $slug. '.' . $file->extension();
                $file->move(public_path('images'), last($images));
            }

            session()->flash('msg', 'Файлы '.implode(', ', $images).' были успешно загружены');

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

    public function destroy($post_slug)
    {
        $post = Post::where('slug', $post_slug)->first();
        //TODO при удалении поста, удалять его картинки также
        Post::destroy($post->id);

        return redirect('/');
    }
}
