<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_vi')->nullable();
            $table->string('name_en')->nullable();
            $table->string('slug')->nullable();
            $table->string('description_vi')->nullable();
            $table->string('description_en')->nullable();
            $table->string('img_url')->nullable();
            $table->integer('price_vi')->nullable();
            $table->integer('price_en')->nullable();
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
        Schema::drop('ship_costs');
    }
}
