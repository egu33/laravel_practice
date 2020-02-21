<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{public function edit($id)
    $data =Task::find($id);

    return view("edit", ["massage" => "編集フォーム" , "data" => $data]);
}


