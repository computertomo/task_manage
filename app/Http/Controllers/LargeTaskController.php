<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LargeTask;

class LargeTaskController extends Controller
{
    public function index(LargeTask $large_tasks)
    {
        return view('projects/show')->with(['middle_tasks' => $large_tasks->getByLarge_tasks()]);
    }
}
