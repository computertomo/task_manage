<!DOCTYPE HTML>
@extends('layouts.app')
@section('content')
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tasks</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <div class="content">
            <div class="content__task">
                <h3>本文</h3>
                <p>{{ $task->body }}</p>
                <p>{{ $task->start_at }}</p>
            </div>
        </div>
        <p class="edit">[<a href="/tasks/{{ $task->id }}/edit">edit</a>]</p>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
@endsection