<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks', ['tasks' => $tasks]);
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task();
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    }

    public function delete(Task $task)
    {
        $task->delete();

        return redirect('/');
    }

    public function edit(Task $task)
    {
        return view('/edit', compact('task'));
    }

    public function update($task ,Request $request){
        $task = Task::find($task);

        $task->name = $request->name;
        $task->save();

        return redirect('/');
    }
}
