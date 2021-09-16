<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('user_id');
            $table->float('amount');
            $table->float('vat');
            $table->string('shipping');
            $table->float('total_amount');
            $table->float('paying_amount');
            $table->string('order_date');
            $table->string('month');
            $table->integer('year');
            $table->string('pay_by');
            $table->string('card_number');
            $table->string('tracking_code');
            $table->integer('order_status')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
