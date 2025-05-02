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
        Schema::create('wishlist_items', function (Blueprint $table) {
            $table->id('id_wishlist_items');
            $table->unsignedBigInteger('id_wishlist');
            $table->unsignedBigInteger('id_product');
            $table->timestamps();
            
            $table->foreign('id_wishlist')
                  ->references('id_wishlist')
                  ->on('wishlist')
                  ->onDelete('cascade');
                  
            $table->foreign('id_product')
                  ->references('id_product')
                  ->on('products')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlist_items');
    }
};
