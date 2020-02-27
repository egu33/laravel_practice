
@extends('layouts.app')
@push('tasks_css')
<link rel="stylesheet" href="/css/tasks.css">
@endpush
@section('content')
    <div class="container">
        <div class="col-sm-offset-0 col-sm-28">
            <div class="panel panel-default">
                <div class="panel-heading">
                    新しいタスク
                </div>
                <div class="panel-body">
                    <!-- 新タスクフォーム -->
                    <form action="{{ url('/tasks/create')}}" method="POST" class="form-horizontal">
                        @csrf
                        @method('GET')
                        <!-- タスク名 -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">タスク</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>
                        <!-- タスク追加ボタン -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <div>

                                    <select name="priority" class="cp_ipselect cp_sl05">
                                        <option value="1">低</option>
                                        <option value="2" selected>中</option>
                                        <option value="3">高</option>
                                    </select>
                                </div>
                                <div>
                                    <input type="date" value= "<?php echo date('Y-m-d');?>" name="limit"  required>
                                </div>
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i> タスク追加
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- TODO: 現在のタスク -->
            @if (count($tasks) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            現在のタスク
        </div>
        <div class="panel-body">
            <table class="table table-striped task-table">
                <!-- テーブルヘッダ -->
                <thead>
                    <tr>
                        <th width=60px>期限</th>
                        <th width=60px>優先度</th>
                        <th>タスク</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <!-- テーブル本体 -->
                <tbody>
                    @php $priority = 0; @endphp
                    @foreach ($tasks as $task)
                        <tr>
                            <td width=100px>
                                <div> @php
                                    if($task->limit < date('Y-m-d')){
                                        echo "<p class='limit_over'>$task->limit</p>";
                                        } else {
                                            echo "$task->limit";
                                        }
                                @endphp </div>
                                {{-- 優先度ごとにバックグラウンドカラーを変える --}}
                            </td>
                            <td @if ($task->priority == 1)
                                    class = "background_green"
                                @elseif($task->priority == 2)
                                    class = "background_blue"
                                @else
                                    class ="background_red"
                            @endif>
                            {{-- 優先度振り分け --}}
                                @php
                                if ($task->priority == 1) {
                                    if ($priority != $task->priority) {
                                        echo  "<p class='text_color_white'>低</p>";
                                        $priority = $task->priority;
                                    }
                                }
                                elseif ($task->priority == 2) {
                                    if ($priority != $task->priority) {
                                        echo "<p class='text_color_white'>中</p>";
                                        $priority = $task->priority;
                                    }
                                }
                                elseif ($task->priority == 3) {
                                    if ($priority != $task->priority) {
                                        echo "<p class='text_color_white'>高</p>";
                                        $priority = $task->priority;
                                    }
                                }
                              @endphp
                            </td>
                            <td class="table-text">
                                {{$task->name}}
                            </td>
                            <td width =500px>
                            </td>
                            {{-- 編集ボタン --}}
                            <td class="edit">
                                <form action="{{ url('edit/' . $task->id)}}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn">
                                          <i class="fa fa-btn fa-gear"> </i>編集</a>
                                    </button>
                                </form>
                            </td>
                            <!-- TODO: 削除ボタン -->
                            <td>
                                <form action="{{ url('tasks/' . $task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i> 削除
                                    </button>
                                </form>
                            </td>
                            <td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
        </div>
    </div>
@endsection

