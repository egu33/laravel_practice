
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    新しいタスク
                </div>
                <div class="panel-body">
                    <!-- 新タスクフォーム -->
                    <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                        @csrf
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
                        <th>タスク</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <!-- テーブル本体 -->
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="edit">
                                <form action="{{ url('edit/' . $task->id)}}" method="POST" >
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn">
                                          <i class="fa fa-btn fa-gear"> </i>編集</a>
                                    </button>
                                </form>
                                <div>{{ $task->name }}</div>
                            </td>
                            <!-- TODO: 削除ボタン -->
                            <td>
                                <form action="{{ url('task/' . $task->id) }}" method="POST">
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

