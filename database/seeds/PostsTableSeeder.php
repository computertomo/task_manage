<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('tasks')->insert([
            //'body' => '命名はデータを基準に考える',
            //'category_id' => 1
        //]);
        //DB::table('tasks')->insert([
            //'body' => '読めるようになれば怖くない',
            //'category_id' => 1
        //]);
    //}
    factory(App\Task::class, 5)->create();
    }
}