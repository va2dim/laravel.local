<?php

namespace App\Http\Controllers;

use App\Quote;
use App\Author;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    public function index()
    {
        $quotes = Quote::latest('publicate_at')
            ->filter(request(['author', 'hubs', 'source', 'publicate_at']))
            ->simplePaginate(4);
//dd(request()->getRequestUri());

        //dd($_REQUEST);
        return view('quotes.index', compact('quotes'));
    }

    public function create()
    {
        $authors = Author::get();
        //return view('quotes.create', compact('authors, sources, category'));
        return view('quotes.create', compact('authors'));
    }

    public function show(Quote $quote)
    {

        return view('quotes.show', compact('quote'));
    }

    public function store()
    {
        $this->validate(request(), [
            'body' => 'required',
        ]);

        //dd($_REQUEST);
        Quote::create([
            'title' => request('title'),
            'body' => request('body'),
            'author_id' => request('author'),
            'publicated_at' => request('publicated_at'),
        ]);

        return redirect('/quotes');
    }
}