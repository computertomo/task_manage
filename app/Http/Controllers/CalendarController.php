<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LargeTask;

class CalendarController extends Controller
{
    public function show(LargeTask $large_task) {
    return view('calender/draggable_calendar')->with(['large_tasks' => $large_task->getPaginateByLimit()]);
}
    public function res_data(LargeTask $large_task)
    {
        dd($large_task->get());
        $res_large = $large_task->get();
        response()->json($res_large);
    }
}
