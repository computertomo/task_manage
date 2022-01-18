<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Task Management</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>タスク一覧</h1>
        <div class='tasks'>
            @foreach ($tasks as $task)
                <div class='task'>
                    <h2 class='title'>{{ $task->title }}</h2>
                    <p class='body'>{{ $task->body }}</p>
                </div>
            @endforeach
        </div>
        [<a href='/tasks/create'>create</a>]
    </body>
</html>