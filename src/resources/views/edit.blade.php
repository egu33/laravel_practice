@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                タスクを編集
            </div>
            <div class="panel-body">
                <!-- 新タスクフォーム -->
                <form action="{{ url('edit/' . $task->id . '/store')}}" method="POST" class="form-horizontal">
                    @csrf
                    <!-- タスク名 -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">タスク</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control"
                                value="{{ $task->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">優先度</label>
                        <select name="priority" class="col-sm-6">
                            <option value="1" @if($task->priority == 1) selected @endif >低</option>
                            <option value="2" @if($task->priority == 2) selected @endif>中</option>
                            <option value="3" @if($task->priority == 3) selected @endif>高</option>
                        </select>
                    </div>
                    {{-- 期限入力ボタン --}}
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">期日</label>
                        <input type="date" name="limit" value="{{$task->limit}}" required>
                    </div>
                    <!-- タスク編集ボタン -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-3 control-label">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i> タスク編集
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection



{{-- @extends('layouts.master')
@section('title', 'サンプルページ')
@section('content') --}}

{{-- <p>aaa</p>
<form class="form-signin" role="form" method="post" action="/mylaravel/public/greeting/update/{{$data->id}}">
<input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
{{-- -- 隠し -- --}}
{{-- <input type="hidden" name="_method" value="PATCH"> --}}
{{-- <input type="text" name="onamae" value="{{ $data->onamae }}" class="form-control" placeholder="名前を文字を入力してください"
autofocus> --}}
{{-- バリデーション --}}
{{-- @if($errors->has('onamae')) --}}
{{-- <p class="text-danger" style="margin-bottom: 30px;">{{ $errors->first('onamae') }}</p>
@endif
<button class="btn btn-lg btn-primary btn-block" type="submit">送信</button> --}}
{{-- </form>
@endsection --}}
