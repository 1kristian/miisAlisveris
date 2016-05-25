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
            $table->increments('orders_id');
            $table->integer('user_id')->nullable();
            $table->string('payment_name');
            $table->string('payment_company');
            $table->string('payment_address');
            $table->string('payment_city');
            $table->string('payment_postcode');
            $table->string('payment_country');
            $table->integer('payment_method');
            $table->string('shipping_name');
            $table->string('shipping_company');
            $table->string('shipping_address');
            $table->string('shipping_city');
            $table->string('shipping_postcode');
            $table->string('shipping_country');
            $table->integer('shipping_method');
            $table->text('comment');
            $table->decimal('total', 10, 2);
            $table->integer('status');
            $table->string('ip');
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
