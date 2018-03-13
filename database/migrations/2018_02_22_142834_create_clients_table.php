<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branch_id');
            $table->date('register');
            $table->string('khname',100);
            $table->string('engname',100);
            $table->tinyInteger('gender');
            $table->string('email')->unique();
            $table->string('tel',15);
            $table->tinyInteger('age');
            $table->date('dob');
            $table->string('occ');
            $table->string('addr');
            $table->integer('user_id');
            $table->tinyInteger('active');
            $table->integer('autherizer')->nullable();
            $table->date('autherizerdate')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
