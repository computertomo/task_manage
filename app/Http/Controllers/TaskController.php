<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
        /**
     * Task一覧を表示する
     * 
     * @param Task Taskモデル
     * @return array Taskモデルリスト
     */
    public function index(Task $task)
    {
        return view('tasks/index')->with(['tasks' => $task->get()]);
    }
    public function create()
    {
    return view('tasks/create');
    }
    public function store(Request $request, Task $task)
    {
        $input = $request['task'];
        $task->fill($input)->save();
        return redirect('/tasks' . $task->id);
    }
}
