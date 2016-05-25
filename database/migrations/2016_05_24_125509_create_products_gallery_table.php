<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('products_gallery', function (Blueprint $table) {
                   $table->increments('id');
                   $table->integer('product_id');
                   $table->string('rank')->nullable();
                   $table->string('image');
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
      Schema::drop('products_gallery');
    }
}
