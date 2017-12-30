<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Validator;


class AuthorsController extends Controller
{

    public function create()
    {
        $authors = Author::get();
        return view('authors.create', compact('authors'));
    }

    public function store(Request $request)
    {

        /*
        $this->validate(request(), [
            'author' => 'required|min:2',
        ]);
        return response()->json(['error' => $this->errors()->all()]); Выбрасывает исключение раньше, при валидации
        */
        $validator = Validator::make($request->all(), [
            'author' => 'required|min:2',
        ]);

        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

/*
        $author = Author::create([
            'name' => request('author')
        ]);
        */
        try {
            $author = new Author;
            $author->name = request('author');
            $author->save();
        } catch (QueryException $e) {
            return response()->json(['error' => $e]);

        }

        return response()->json(['success'=>'Новый автор '.$author->name.' добавлен']);

    }
}
