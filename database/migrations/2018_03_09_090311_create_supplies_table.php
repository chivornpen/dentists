<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('companyKhName')->nullable();
            $table->string('companyEnName')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('personalName');
            $table->string('email');
            $table->string('personalContact');
            $table->integer('branch_id');
            $table->string('location')->nullable();
            $table->integer('user_id');
            $table->tinyInteger('active');
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
        Schema::dropIfExists('supplies');
    }
}
