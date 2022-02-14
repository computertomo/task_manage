<!DOCTYPE HTML>
@extends('layouts.app')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Task_Manage</title>
    </head>
    <body>
        <h1>Task_Manage</h1>
        <form action="/tasks" method="POST" >
            @csrf
            <div class="body">
                <h2>Body</h2>
                <textarea name="task[body]" placeholder="タスクの詳細"></textarea>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>
@endsection