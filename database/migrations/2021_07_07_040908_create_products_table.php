<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('cat_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->integer('sub_cat_id')->unsigned();
            $table->integer('sub_sub_cat_id')->unsigned();
            $table->string('product_name',255);
            $table->text('product_description');
            $table->integer('product_quantity');
            $table->float('product_price',20,2);
            $table->float('product_discount',20,2)->nullable();
            $table->string('product_discount_type',10)->nullable();
            $table->float('product_discount_price',20,2)->nullable();
            $table->text('product_image');
            $table->tinyInteger('slider');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('products');
    }
}
