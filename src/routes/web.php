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

Route::get('/tasks' , 'TaskController@index');
Route::get('/tasks/create' , "TaskController@create");
Route::delete('tasks/{task}',  'TaskController@destroy');
Route::post('/edit/{task}' ,'TaskController@edit');
Route::post('/edit/{task}/store', 'TaskController@update');
