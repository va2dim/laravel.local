<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/tasks/', function () {
    $name = 'Vadim';
    //$tasks = DB::table('tasks')->get();
    $tasks = App\Task::all();

    //return $tasks; //return will be in JSON
    return view('tasks.index', compact('tasks', 'name'));
});

Route::get('/tasks/{task_id}', function ($id) {
    //$task = DB::table('tasks')->find($id);
    $task = App\Task::find($id);

    $name = 'Vadim';
    return view('tasks.show', compact('task', 'name'));
});
