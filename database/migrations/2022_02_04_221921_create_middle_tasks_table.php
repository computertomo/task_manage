<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiddleTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('middle_tasks', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('category_id')->unsigned()->default(3);
                $table->string('body', 200)->nullable();
                $table->dateTime('start_at')->nullable();
                $table->dateTime('finish_day')->nullable();
                $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('middle_tasks');
    }
}
