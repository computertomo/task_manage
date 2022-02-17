<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\LargeTask;
use App\Event;

class CalendarController extends Controller
{
    public function show(LargeTask $large_task) {
    return view('calender/draggable_calendar')->with(['large_tasks' => $large_task->getPaginateByLimit()]);
}
    public function res_projects_data(LargeTask $large_task)
    {
        $res_projects_large = $large_task->get();
        // $res_projects_middle = $large_task->middle_tasks;
        return response()->json($res_projects_large);
    }
    public function res_tasks_data(Task $task)
    {
        $res_tasks = $task->get();
        return response()->json($res_tasks);
    }
    
    public function setEvents(Request $request)
    {
        //表示した月のカレンダーの始まりの日を終わりの日をそれぞれ取得。
        $start = $this->formatDate($request->input('start'));
        $end = $this->formatDate($request->input('end'));

        //カレンダーの期間内のイベントを配列で取得
        //EventsObjectが対応している配列キーの名前に変更するため、dateをstartとする
        $result = Task::select('id', 'body', 'start_at as start','finish_day')->whereBetween('start_at', [$start, $end])->get()->toArray();
        dd($request);

        echo json_encode($result);
        //json形式にして出力
    }

    // "2019-12-12T00:00:00+09:00"のようなデータを今回のDBに合うように"2019-12-12"に整形
    private function formatDate($date)
    {
        return str_replace('T00:00:00+09:00', '', $date);
    }

}

