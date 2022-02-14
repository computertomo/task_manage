<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeMiddleTaskIdColumnOfSmallTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('small_tasks', function (Blueprint $table) {
            $table->renameColumn('middle_task_id', 'middle_tasks_id'); // カラムの物理名変更
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('small_tasks', function (Blueprint $table) {
            //
        });
    }
}
