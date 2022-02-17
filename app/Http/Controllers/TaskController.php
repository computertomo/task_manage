<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;

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
        return view('tasks/task_draggable')->with(['tasks' => $task->getPaginateByLimit()]);
    }
    /**特定IDのtaskを表示する
     * 
     * @param Object Task //引数の$taskはid=1のTaskインスタンス
     * @return Response task view
     */
    public function show(Task $task)
    {
        return view('tasks/show')->with(['task'=>$task]);
    }
    public function create(Category $category)
    {
        return view('tasks/create')->with(['categories' => $category->get()]);;
    }
    public function store(Request $request, Task $task)
    {
        $input = $request['task'];
        $task->fill($input)->save();
        return redirect('/');
    }
    public function edit(Task $task)
    {
        return view('tasks/edit')->with(['task' => $task]);
    }
    public function update(Request $request, Task $task)
    {
        $input_task = $request['task'];
        $task->fill($input_task)->save();
        return redirect('/tasks/' . $task->id);
    }
    public function delete(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
    public function res_data(Task $task)
    {
        dd($task->get());
        $res_large = $task->get();
        response()->json($res_large);
    }
}
