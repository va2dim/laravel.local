<?php

namespace App\Http\Controllers;

use App\Category;
use App\Quote;
use App\Author;
use App\Source;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class QuotesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);

    }

    public function index()
    {
        $tags = ['йога', 'аюрведа', 'суфизм'];

        foreach(range(0, 2) as $i) {
            $name = $tags[$i];
            $slug = SlugService::createSlug(\App\Tag::class, 'slug', $name);
            echo $name.$slug."<br>";
        }

        die;
        $quotes = Quote::latest('publicate_at')
            ->filter(request(['author', 'hubs', 'source', 'publicate_at']))
            ->simplePaginate(4);
//dd(request()->getRequestUri());

        //dd($_REQUEST);
        return view('quotes.index', compact('quotes'));
    }


    public function update(Quote $quote)
    {
        $authors = Author::get();
        $sources = Source::get();
        $categories = Category::get();

        return view('quotes.update', compact('quote', 'authors', 'sources', 'categories'));
    }

    public function show(Quote $quote)
    {

        return view('quotes.show', compact('quote'));
    }

    public function store()
    {
        //dd($_REQUEST);

        $this->validate(request(), [
          'body' => 'required',
        ]);

        Quote::updateOrCreate(
          [
            'id' => request('id'),
          ],
          [
            'user_id' => auth()->user()->id,
            'title' => request('title'),
            'slug' => request('title'),
            'body' => request('body'),
            'author_id' => request('author'),
            'source_id' => request('source'),
            'category_id' => request('category'),
            'publicate_at' => request('publicate_at')
          ]
        );

        return redirect('/quotes');
    }

    public function destroy(Quote $quote)
    {
        Quote::destroy($quote->id);

        return redirect('/quotes');
    }
}