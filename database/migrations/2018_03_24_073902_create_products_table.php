<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_vi')->nullable();
            $table->string('name_en')->nullable();
            $table->string('slug')->nullable();
            $table->string('description_vi')->nullable();
            $table->string('description_en')->nullable();
            $table->string('sku')->nullable();
            $table->integer('quantity')->nullable();
            $table->text('content_vi')->nullable();
            $table->text('content_en')->nullable();
            $table->integer('price_vi')->nullable();
            $table->integer('price_en')->nullable();
            $table->string('img_url')->nullable();
            $table->boolean('hot')->default(0);
            $table->boolean('promotion')->default(0);
            $table->string('show_number')->nullable()->default(0);
            $table->integer('order')->nullable();
            $table->boolean('status')->default();
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::drop('products');
    }
}
