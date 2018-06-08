@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>

     @if (count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ステータス</th>
                    <th>タスク</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->content }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <a class="btn btn-primary btn-sm" href="{{ route('tasks.create') }}"><span tasks.create="color:#11569E" class='glyphicon glyphicon-plus'></span>  新規タスクの投稿</a>
@endsection