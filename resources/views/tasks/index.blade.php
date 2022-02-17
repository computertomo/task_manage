@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Task Management</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" href="/task_manage/public/css/tasks/index.css">>
    </head>
    <body>
        <h1>タスク一覧</h1>
        [<a href='/projects'>プロジェクト一覧</a>]
        [<a href='/calendar'>カレンダーへ</a>]
        <div class = task_calendar>
            <div class='tasks'>                             //ここからタスク表示部分
                @foreach ($tasks as $task)
                    <div class='task'>
                        <div class='task_contents'>
                            <div class='task_sentence'>
                                <a href="tasks/{{ $task->id }}">{{ $task->body }}</a>
                            </div>
                        </div>
                        <div class='task_delete'>
                            <form action="/tasks/{{ $task->id}}" id="form_{{ $task->id }}" method="post" style="display:inline">
                                @csrf
                                @method('DELETE')
                            <button type='submit'>delete</button>
                        </div>
                    </div>
                    </form>
                @endforeach
            </div>
            <div id='calendar'></div>                         //ここからカレンダー機能部分
            [<a href='/tasks/create'>create</a>]
            <div class='paginate'>
                {{ $tasks->links() }}
            </div>
        </div>
        <script src='{{asset('js/main.js')}}'></script>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
              initialView: 'dayGridMonth'
            });
            calendar.render();
          });
        </script>
    </body>
</html>
@endsection