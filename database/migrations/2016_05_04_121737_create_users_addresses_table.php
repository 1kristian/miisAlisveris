<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
       Schema::create('users_addresses', function (Blueprint $table) {
                    $table->increments('user_address_id');
                    $table->integer('user_id')->nullable();
                    $table->string('name');
                    $table->string('company');
                    $table->string('address');
                    $table->string('city');
                    $table->string('postcode');
                    $table->string('country');
                    $table->integer('status');
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
        Schema::drop('users_addresses');
    }
}
