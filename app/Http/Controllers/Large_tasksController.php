<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Large_tasksController extends Controller
{
    public function index(LargeTask $large_tasks)
    {
        return view('projects.index')->with(['middle_tasks' => $large_tasks->getByLarge_tasks()]);
    }
}
