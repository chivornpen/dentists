<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorhisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctorhis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id');
            $table->string('name');
            $table->char('gender','6');
            $table->string('contact')->nullable();
            $table->string('level')->nullable();
            $table->string('grade')->nullable();
            $table->string('section_id')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->double('commission')->nullable();
            $table->double('comBalance')->nullable();
            $table->double('baseSalary')->nullable();
            $table->double('availableBalance')->nullable();
            $table->date('effectDate')->nullable();
            $table->date('endDate')->nullable();
            $table->string('photo')->nullable();
            $table->tinyInteger('active');
            $table->integer('branch_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('recordNo')->nullable();
            $table->string('authorizer')->nullable();
            $table->date('authorizeDate')->nullable();
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
        Schema::dropIfExists('doctorhis');
    }
}
