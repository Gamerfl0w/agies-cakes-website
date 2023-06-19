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
            $table->text('paymongo_id');
            $table->timestamps();
            $table->integer('user_id');
            $table->string('name');
            $table->text('cart');
            $table->string('phonenumber');
            $table->string('country');
            $table->string('city');
            $table->text('address');
            $table->integer('zipcode');
            $table->string('total');
            $table->string('shipping');
            $table->string('payment_type');
            $table->timestamp('date')->nullable();
            $table->text('status')->nullable();
            $table->text('serialized_cart');
            $table->text('isDelivered')->default('No');
            $table->text('reason')->nullable();
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