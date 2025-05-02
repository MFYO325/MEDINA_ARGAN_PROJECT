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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('id_order_items');
            
            // Clés étrangères
            $table->unsignedBigInteger('id_order');
            $table->unsignedBigInteger('id_product');
            
            // Champs
            $table->integer('quantity')->default(1);
            $table->timestamps();
            
            // Contraintes
            $table->foreign('id_order')
                  ->references('id_order')
                  ->on('order') // ou 'orders' selon votre nom de table
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
        Schema::dropIfExists('order_items');
    }
};
