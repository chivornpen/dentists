<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableScheduleSubject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_subject', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schedule_id');
            $table->integer('subject_id');
            $table->tinyInteger('day');
            $table->time('start');
            $table->time('end');
            $table->string('classroomNum')->nullable();
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
        Schema::dropIfExists('schedule_subject');
    }
}
