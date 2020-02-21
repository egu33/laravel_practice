<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks', ['tasks' => $tasks]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $tasks = new Task();
        $tasks->name = $request->name;
        $tasks->save();

        return redirect('/');
    }

    public function delete(Task $task)
    {
        $task->delete();

        return redirect('/');
    }

    public function jump($id)
    {
        $task = Task::find($id);
        return view('/edit', compact('task'));
    }

    public function update($id ,Request $request){
        $task = Task::find($id);

        $task->name = $request->name;
        $task->save();

        return redirect('/');
    }
}
