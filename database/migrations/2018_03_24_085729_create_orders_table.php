<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('total')->default(0);
            $table->integer('promotion_id')->nullable();
            $table->integer('shipcost_id')->unsigned();
            $table->foreign('shipcost_id')->references('id')->on('ship_costs');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->integer('paymentmethod_id')->unsigned();
            $table->foreign('paymentmethod_id')->references('id')->on('payment_methods');
            $table->integer('shipstatus_id')->unsigned();
            $table->foreign('shipstatus_id')->references('id')->on('ship_statuses');
            $table->integer('paymentstatus_id')->unsigned();
            $table->foreign('paymentstatus_id')->references('id')->on('payment_statuses');
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
        Schema::drop('orders');
    }
}
