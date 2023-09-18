<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger('product_id');
            $table->string('product_name', 255);
            $table->unsignedInteger('product_quantity');
            $table->unsignedBigInteger('buyer_id');
            $table->string('buyer_name', 255);
            $table->string('buyer_mobileno', 255);
            $table->string('buyer_address', 255);
            $table->string('billing_status', 255);
            $table->string('billing_type', 255);
            $table->string('order_price', 255);
            $table->string('order_status', 255);
            $table->text('order_notes');
            $table->unsignedInteger('priority');
            $table->unsignedBigInteger('seller_id');
            $table->string('seller_name', 255);
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('product_id')->references('id')->on('product_models');
            $table->foreign('buyer_id')->references('id')->on('users');
            $table->foreign('seller_id')->references('id')->on('users');
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
};
