<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __constructor()
    {
        //$this->middleware('guest', ['except' => 'destroy']);
        $this->middleware('guest')->except(['destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        //Attempt to login: compare with DB, if OK - auto sign in
        if (!auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Проверьте вводимые данные'
            ]);
        }
        //return redirect()->back(302,['Location: /about'], false); TODO: вернуться на туже стр. (History -2), сохр. var в куки
        return redirect()->home();
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }
}
