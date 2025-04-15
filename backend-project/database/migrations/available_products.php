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
        Schema::create('available_products', function (Blueprint $table) {
            $table->id('id_available'); 
            $table->unsignedBigInteger('idproduct');
            $table->string('size')->nullable(); 
            $table->decimal('real_price', 8, 2); 
            $table->decimal('sell_price', 8, 2)->nullable(); 
            $table->integer('stock')->unsigned(); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('available_products');
    }
};
