<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('treatmenttype_id');
            $table->date('date');
            $table->string('khname');
            $table->string('engname');
            $table->float('unitPrice');
            $table->float('dis')->nullable();
            $table->boolean('iscommision');
            $table->integer('authorize')->nullable();
            $table->date('authorizedate')->nullable();
            $table->integer('user_id');
            $table->boolean('active');
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
        Schema::dropIfExists('treatments');
    }
}
