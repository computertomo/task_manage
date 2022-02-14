<?php

namespace App\Http\Controllers;
use App\Task;
use App\LargeTask;
use App\Middle_tasks;
use App\Small_tasks;
use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;

class ProjectController extends Controller
{
        /**
     * Task一覧を表示する
     * 
     * @param Task Taskモデル
     * @return array Taskモデルリスト
    public function index(Large_tasks $large_tasks)
    {
        return view('projects.index')->with(['middle_tasks' => $large_tasks->getByLarge_tasks()]);
    }
     */
    // public function index(Large_tasks $large_task, Middle_tasks $middle_task, Small_tasks $small_task)
    // {
    //     return view('projects/index')->with('middle_tasks', $middle_task)->with('small_tasks', $small_task)->with(['large_tasks' => $large_task->getByLarge_tasks]);
    // }
    
    public function index(LargeTask $large_task)
    {
        return view('projects/index')->with(['large_tasks' => $large_task->getPaginateByLimit()]);
    }

    public function show(LargeTask $large_task, Middle_tasks $middle_task)
    {
        return view('projects/show')->with(['project_content'=>$large_task])->with(['project_content'=>$middle_task]);
    }
    public function create(LargeTask $large_task,Middle_tasks $middle_task)
    {
        return view('projects/create')->with(['large_tasks' => $large_task->get()]);;
    }
    public function store(Request $request, LargeTask $large_task,Middle_tasks $middle_task)
    {
        // 大目標の保存
        $l_input = $request['large_task'];
        $large_task->fill($l_input)->save();
        // 中目標の保存
        $m_input = $request['m_task'];
        foreach($m_input["index"] as $m_task){
            $middle_task = new Middle_tasks();
            $middle_task->body=$m_task; // ここが入力された値
            $middle_task->large_tasks_id = $large_task->id;
            $middle_task->save();
        }
        return redirect('/projects');
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
    public function l_delete(LargeTask $large_task)
    {
        $large_task->delete();
        return redirect('/projects');
    }
    public function m_delete(Middle_tasks $middle_task)
    {
        $middle_task->delete();
        return redirect('/projects');
    }
    public function res_data(Task $task)
    {
        dd($task->get());
        $res_large = $task->get();
        response()->json($res_large);
    }
}


    // public function index(Large_tasks $large_task,Middle_tasks $middle_task)
    // {
    //     return view('projects/index')->with(['large_tasks' => $large_task->getPaginateByLimit()])->with(['middle_tasks' => $large_task->getBymiddle_tasks()]);
    // }