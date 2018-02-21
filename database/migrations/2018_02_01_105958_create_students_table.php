<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->char('studentId',100);
            $table->date('date');
            $table->integer('session_id');
            $table->integer('batch_id');
            $table->string('khname',120);
            $table->string('engname',120);
            $table->char('gender','1');
            $table->date('dob');
            $table->string('fname',100);
            $table->string('faocc');
            $table->string('moName',100);
            $table->string('moOcc');
            $table->tinyInteger('chilNum');
            $table->tinyInteger('female');
            $table->tinyInteger('male');
            $table->string('phoneNumber',30);
            $table->string('refer',30);
            $table->string('pob');
            $table->string('address');
            $table->string('profile')->nullable();
            $table->string('status')->nullable();
            $table->tinyInteger('active');
            $table->integer('user_id');
            $table->tinyInteger('newres');
            $table->tinyInteger('added');
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
        Schema::dropIfExists('students');
    }
}
