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
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name', 100);
            $table->integer('stock');
            $table->text('description');
            $table->integer('sell_price')->nullable();
            $table->integer('rent_price')->nullable();
            $table->string('image');
            $table->integer('is_sold')->default(0);
            $table->integer('is_rented')->default(0);
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('product_categories')->onUpdate('cascade');
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
