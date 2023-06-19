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
            $table->string('name');
            // $table->string('brand');
            $table->integer('price');
            $table->string('image');
            $table->string('info')->default("No Information");
            $table->string('size')->nullable();
            $table->string('flavor')->nullable();
            $table->string('filling')->nullable();
            $table->string('icing')->nullable();
            $table->string('message')->nullable();
            $table->string('note')->nullable();
            // $table->string('gender');
            // $table->string('category');
            $table->integer('quantity')->default(1);
            $table->integer('popularity')->default(0);
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