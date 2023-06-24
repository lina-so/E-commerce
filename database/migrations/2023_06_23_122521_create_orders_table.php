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
            // $table->bigInteger('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // $table->bigInteger('subproduct_id')->unsigned();
            // $table->foreign('subproduct_id')->references('id')->on('subproducts')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('subproduct_id')->references('id')->on('subproducts')->cascadeOnDelete()->cascadeOnUpdate();


            $table->integer('status')->default(0);
            $table->string('payment_method');
            $table->string('payment_status');
            $table->string('payment_id');
            $table->string('shipping_price');
            $table->string('total_price');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('city');
            $table->string('country');
            $table->string('postal_code');
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
};
