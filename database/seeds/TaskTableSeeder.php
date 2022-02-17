<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
        'body' => '命名はデータを基準に考える',
        ]);
        DB::table('tasks')->insert([
            'body' => '読めるようになれば怖くない',
        ]);
        factory(App\Task::class, 5)->create();
        }
}
