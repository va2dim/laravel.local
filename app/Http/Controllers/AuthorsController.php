<?php

namespace App\Http\Controllers;

use App\Author;



class AuthorsController extends Controller
{


    public function store(Author $author)
    {

        $this->validate(request(), [
            'author' => 'required|min:2',
        ]);

        $quotes->addAuthor(request('id'));

        //return redirect('/post/'.$this->post->id); // or in a simple way
        return back();
    }
}
