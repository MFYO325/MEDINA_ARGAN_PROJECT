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
        Schema::create('available_volumes', function (Blueprint $table) {
            $table->id('id_available_volumes');
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('id_img')->nullable();
            $table->decimal('real_price', 10, 2);
            $table->decimal('sell_price', 10, 2);
            $table->integer('quantity');
            $table->integer('stock');
            $table->timestamps();
            
            $table->foreign('id_product')
                  ->references('id_product')
                  ->on('products')
                  ->onDelete('cascade');
                  
            $table->foreign('id_img')
                  ->references('id_img')
                  ->on('images')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('available_volumes');
    }
};
