<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    public function index()
    {
        $quotes = Quote::latest('publicate_at')
            ->simplePaginate(4);

        return view('quotes.index', compact('quotes'));
    }

    public function create()
    {

        return view('quotes.create');
    }

    public function show(Quote $quote)
    {

        return view('quotes.show', compact('quote'));
    }
}
