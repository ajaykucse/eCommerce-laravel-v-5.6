<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shipping', function (Blueprint $table) {
            $table->increments('shipping_id');
            $table->increments('shipping_email');
            $table->increments('shipping_first_name');
            $table->increments('shipping_last_name');
            $table->increments('shipping_address');
            $table->increments('shipping_mobile_number');
            $table->increments('shipping_city');
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
        Schema::dropIfExists('tbl_shipping');
    }
}
