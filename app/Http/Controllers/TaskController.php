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
        return $task->get();
    }
}
