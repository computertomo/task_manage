@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Task Management</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" href="/task_manage/public/css/projects/index.css">>
    </head>
    <body>
        <h1>プロジェクト一覧</h1>
            [<a href='/'>シングルタスク一覧</a>]
            [<a href='/projects/create'>プロジェクトを作成する</a>]
            [<a href='/calendar'>カレンダーへ</a>]
                @foreach ($large_tasks as $large_task)
                     <!--ここから大目標表示部分-->
                    <div class='project_box'>
                        <div class='large_project'>
                            <div class='large_project_contents'>
                                <div class='large_project_sentence'>
                                    <a href="projects/large_project/{{ $large_task->id }}">{{ $large_task->body }}</a>
                                </div>
                            </div>
                        </div>
                        <!--ここから中目標表示-->
                        @foreach($large_task->middle_tasks as $middle_task)
                            <!--チェックボックスを表示-->
                            <form method=”post” action="">
                            <input type="checkbox" id="checkbox{{$middle_task->id}}"name="[]">
                            </form>
                            <div class='middle_project'>
                                <div class='middle_project_contents'>
                                    <!--プロジェクト内容表示-->
                                    <div class='middle_project_sentence'>
                                        <a href="projects/middle_project/{{ $middle_task->id }}" class="middle_text">{{ $middle_task->body }}</a>
                                    </div>
                                    <div class='task_delete'>
                                    <form action="/projects/middle_task/delete/{{$middle_task->id}}" id="form_{{ $middle_task->id }}" method="post" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type='submit'>delete</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                        @endforeach
                            <div class='large_task_delete'>
                                <form action="/projects/large_task/delete/{{$large_task->id}}" id="form_{{ $large_task->id }}" method="post" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type='submit' class="l_delete">delete</button>
                                        <button type="button" @click="test" >test</button>
                                </form>
                            </div>
                    </div>
                @endforeach
        <script>
           　// チェックボックスついたときの計算コード
        </script>
    </body>
</html>
@endsection