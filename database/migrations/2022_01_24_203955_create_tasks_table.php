<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
        {
            Schema::create('tasks', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('category_id')->unsigned()->default(1);
                $table->string('body', 200);
                $table->dateTime('start_at');
                $table->dateTime('finish_day');
                $table->dateTime('deleted_at');
                $table->timestamps();        
                
            });
        }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
