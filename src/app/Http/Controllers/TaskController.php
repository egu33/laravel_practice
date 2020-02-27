<?php

namespace App\Http\Controllers;

use App\Http\Requests\Validation;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('limit', 'asc')->orderBy('priority', 'desc')->orderBy('created_at', 'asc')->get();

        return view('tasks', ['tasks' => $tasks]);
    }

    public function create(Validation $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->priority = $request->priority;
        $task->limit = $request->limit;
        $task->save();

        return redirect('/tasks');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/tasks');
    }

    public function edit(Task $task)
    {
        return view('/edit', compact('task'));
    }

    public function update($task, Request $request)
    {
        $task = Task::find($task);

        $task->name = $request->name;
        $task->priority = $request->priority;
        $task->limit = $request->limit;
        $task->save();


        return redirect('/tasks');
    }
}
