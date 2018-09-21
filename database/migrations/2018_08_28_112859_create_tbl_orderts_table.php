<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblOrdertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->string('order_total');
            $table->integer('order_status');
            $table->integer('customer_id')->unsigned();
            $table->integer('shipping_id')->unsigned();
            $table->integer('payment_id')->unsigned();
            $table->foreign('customer_id')->references('order_id')->on('tbl_customers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('shipping_id')->references('order_id')->on('tbl_shipping')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('payment_id')->references('order_id')->on('tbl_payment')->onDelete('cascade')->onUpdate('cascade');


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
        Schema::dropIfExists('tbl_orders');
    }
}
