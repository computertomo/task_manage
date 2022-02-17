<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Task_Manage</title>
    </head>
    <body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/tasks/{{ $task->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__body'>
                <h2>本文</h2>
                <input type='text' name='task[body]' value="{{ $task->body }}">
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>
</html>