<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code')->default(1)->comment('1: Chưa Thanh Toán, 2: Đã Thanh Toán');
            $table->text('description')->nullable();
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
        Schema::drop('payment_statuses');
    }
}
