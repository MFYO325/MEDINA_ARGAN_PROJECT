<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id('id_cart_items');
            $table->unsignedBigInteger('id_cart');
            $table->unsignedBigInteger('id_product');
            $table->integer('quantity')->default(1);
            $table->timestamps();
        
            $table->foreign('id_cart')->references('id_cart')->on('cart')->onDelete('cascade');
            $table->foreign('id_product')->references('id_product')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
