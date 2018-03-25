<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->unique();
            $table->string('slug')->nullable();
            $table->string('sku_promotion');
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->string('target')->default('subtotal');
            $table->integer('value')->default('-10');
            $table->string('value_type')->default('%');
            $table->integer('quantity')->default(100);
            $table->boolean('status')->default(1);
            $table->date('from_time');
            $table->date('to_time');
            $table->integer('num_use')->default(0);
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
        Schema::drop('promotion_codes');
    }
}
