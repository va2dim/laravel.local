<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        $name = 'Vadim';
        //$tasks = DB::table('tasks')->get();
        $tasks = Task::all();

        //return $tasks; //return will be in JSON
        return view('tasks.index', compact('tasks', 'name'));
    }

    public function show(Task $task)
    {
        return $task;
        $task = Task::find($id);

        $name = 'Vadim';
        return view('tasks.show', compact('task', 'name'));
    }
}
