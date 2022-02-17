<!DOCTYPE HTML>
@extends('layouts.app')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Task_Manage</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" href="/task_manage/public/css/projects/create.css">>
    </head>
    <body>
        <h1 class=title>Task_Manage</h1>
        <form action="/projects" method="POST" >
            @csrf
            <div id="project" >
                <!--ここから大目標を表示するコード-->
                <div class="large_task_box">
                    <h2>大目標</h2>
　　　　　　　　　　<!-- 入力ボックスを表示する場所 ① -->
                    <textarea name="large_task[body]" placeholder="Your Dream" class="large_task"></textarea>
                </div>
                <!--ここから中目標を表示するコード-->
                <h2 class="middle_title">中目標</h2>
                <div class=middle_tasks >
                    <!-- 入力ボックスを表示する場所 ① -->
                    <div v-for="(text,index) in m_task" class = "middle_task" name="m_task[large_tasks_id]">
                        <textarea name="m_task[index][]" v-model="m_task[index]"　placeholder="middle achievement"></textarea>
                         <!-- 削除ボタンを表示する場所 ① -->
                        <button type="button" @click="removeInput(index)">削除</button>
                        <button type="button" @click="s_add_Input" class="s_task_add">＋</button>
                        <!--ここから小目標を表示するコード-->
                        <h3 class="small_title">小目標</h3>
                        <div class="small_tasks">
                            <!-- 入力ボックスを表示する場所 ① -->
                            <div v-for="(text,s_index) in s_task" class = "small_task" name="s_task[middle_tasks_id]">
                                <textarea name="s_task[s_index][]" v-model="s_task[s_index]"　placeholder="next achievement"></textarea>
                                 <!-- 削除ボタンを表示する場所 ① -->
                            </div>    
                        </div>
                    </div>    
                    <!-- 中目標の入力ボックスを追加するボタン ② -->
                    <button type="button" @click="addInput" class="task_add">＋</button>
                </div>
                <!-- 保存するためのボタン ② -->
                <input type="submit" value="保存"/>
                <!-- 確認用 -->
                <hr>
                <label>m_tasksの中身</label>
                <div v-text="m_task"></div>        
            </div>
        </form>
        <div class="back">[<a href="/projects">back</a>]</div>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
        <script>
            new Vue({
              el: '#project',
              data: {
              	m_task: [],
              	s_task: [],
              },
              methods: {
                 s_add_Input() {
                    this.s_task.push(''); 
                },
                 addInput() {
                    this.m_task.push(''); 
                },
                removeInput(index) {
                    m_tasks:'',
                    this.m_task.splice(index,1);
                }
              }
            })
        </script>    
    </body>
</html>
@endsection