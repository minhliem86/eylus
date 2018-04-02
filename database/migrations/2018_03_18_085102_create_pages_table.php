<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_vi')->nullable();
            $table->string('name_en')->nullable();
            $table->string('slug')->nullable();
            $table->text('content_vi')->nullable();
            $table->text('content_en')->nullable();
            $table->string('img_url')->nullable();
            $table->string('type')->default('static');
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
        Schema::drop('pages');
    }
}
