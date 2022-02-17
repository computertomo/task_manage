<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'TaskController@index');
    Route::get('/tasks', 'TaskController@show');
    Route::get('/tasks/create', 'TaskController@create');
    Route::get('/tasks/contents', 'CalendarController@res_tasks_data');
    Route::get('/tasks/{task}', 'TaskController@show');
    Route::get('/tasks/{task}/edit', 'TaskController@edit');
    Route::put('/tasks/{task}', 'TaskController@update');
    Route::post('/tasks', 'TaskController@store');
    Route::delete('/tasks/{task}','TaskController@delete');
    Route::get('/projects/create', 'ProjectController@create');
    Route::get('/projects', 'ProjectController@index');
    Route::post('/projects', 'ProjectController@store');
    Route::get('/projects/large_project/{large_task}','ProjectController@show');
    Route::get('/projects/middle_project/{middle_task}','ProjectController@show');
    Route::delete('/projects/middle_task/delete/{middle_task}','ProjectController@m_delete');
    Route::delete('/projects/large_task/delete/{large_task}','ProjectController@l_delete');
    Route::get('/calendar', 'CalendarController@show');
    Route::get('/projects/contents', 'CalendarController@res_projects_data');
    Route::get('/setEvents', 'CalendarController@setEvents');
    Route::get('/projects/{large_tasks}', 'LargeTaskController@index');
    
});

Auth::routes();

