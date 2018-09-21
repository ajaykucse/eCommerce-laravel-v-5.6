<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblOrdertDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order_details', function (Blueprint $table) {
            $table->increments('order_details_id');
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_sales_qty');
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->foreign('order_id')->references('order_details_id')->on('tbl_orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('order_details_id')->on('tbl_products')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tbl_order_details');
    }
}
