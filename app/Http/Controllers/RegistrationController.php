<?php

namespace App\Http\Controllers;


use App\Mail\WelcomeMarkdown;
use App\User;
//use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed', // 4 confirmation need input.password_confirmation
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        //User sign in
        //auth() - helper f 4 \Auth::login();
        auth()->login($user);

        \Mail::to($user)->send(new WelcomeMarkdown($user));

        return redirect()->home();
    }
}
