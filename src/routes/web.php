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

use App\Http\Controllers\TaskController;

Route::get('/' , 'TaskController@index');
Route::post('/task' , "TaskController@add");
Route::delete('task/{task}',  'TaskController@delete');
Route::post('/edit/{id}' ,'TaskController@jump');
Route::post('/edit/{id}/execute', 'TaskController@update');

// Route::get('/', function () {
//     $tasks = Task::orderBy('created_at', 'asc')->get();

//     return view('tasks', [
//         'tasks' => $tasks
//     ]);
// });



// Route::post('/task', function (Request $request) {
//     $validator = Validator::make($request->all(), [
//         'name' => 'required|max:255',
//     ]);

//     if ($validator->fails()) {
//         return redirect('/')
//             ->withInput()
//             ->withErrors($validator);
//     }

//     $tasks = new Task();
//     $tasks->name = $request->name;
//     $tasks->save();

//     return redirect('/');
// });

// Route::delete('task/{task}', function (Task $task) {
//     $task->delete();

//     return redirect('/');
// });

// Route::get('/Task/edit/{id}', 'TaskController@edit');

// Route::get('/edit/{id}', 'TaskController@edit');
// Route::patch('/update/{id}', 'TaskController@update');


// Route::post('/edit/{id}' , function($id){
//     $task = Task::find($id);
//     return view('/edit', compact('task'));
// });

// Route::post('/edit/{id}/execute',function($id ,Request $request){
//     $task = Task::find($id);

//     $task->name = $request->name;
//     $task->save();

//     return redirect('/');

// });
