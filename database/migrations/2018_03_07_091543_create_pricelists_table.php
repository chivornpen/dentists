<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricelistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricelists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->double('fobPrice');
            $table->double('margin');
            $table->double('landingPrice');
            $table->double('sellingPrice');
            $table->date('beginDate');
            $table->date('endDate');
            $table->integer('branch_id')->nullable();
            $table->integer('authorize_id')->nullable();
            $table->date('authorizeDate')->nullable();
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
        Schema::dropIfExists('pricelists');
    }
}
