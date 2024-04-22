<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('index', compact($tasks));
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->back();
    }
}