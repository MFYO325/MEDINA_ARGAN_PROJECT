<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('available_products', function (Blueprint $table) {
            $table->foreign('idproduct')->references('id_product')->on('products');
        });

        Schema::table('cart_items', function (Blueprint $table) {
            $table->foreign('cartid')->references('cart_id')->on('cart');
            $table->foreign('idavailable')->references('id_available')->on('available_products');
        });

        Schema::table('cart', function (Blueprint $table) {
            $table->foreign('userid')->references('user_id')->on('users');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('idparentcategorie')->references('id_categorie')->on('categories');
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->foreign('idorder')->references('id_order')->on('orders');
            $table->foreign('idavailable')->references('id_available')->on('available_products');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('userid')->references('user_id')->on('users');
        });

        Schema::table('payment', function (Blueprint $table) {
            $table->foreign('idorder')->references('id_order')->on('orders');
        });

        Schema::table('product_imgs', function (Blueprint $table) {
            $table->foreign('id_available')->references('id_available')->on('available_products');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('idcategorie')->references('id_categorie')->on('categories');
        });

        Schema::table('wishlist_items', function (Blueprint $table) {
            $table->foreign('wishlistid')->references('wishlist_id')->on('wishlist');
            $table->foreign('idavailable')->references('id_available')->on('available_products');
        });

        Schema::table('wishlist', function (Blueprint $table) {
            $table->foreign('userid')->references('user_id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::table('available_products', function (Blueprint $table) {
            $table->dropForeign(['idproduct']);
        });

        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropForeign(['cartid']);
            $table->dropForeign(['idavailable']);
        });

        Schema::table('cart', function (Blueprint $table) {
            $table->dropForeign(['userid']);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['idparentcategorie']);
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['idorder']);
            $table->dropForeign(['idavailable']);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['userid']);
        });

        Schema::table('payment', function (Blueprint $table) {
            $table->dropForeign(['idorder']);
        });

        Schema::table('product_imgs', function (Blueprint $table) {
            $table->dropForeign(['id_available']);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['idcategorie']);
        });

        Schema::table('wishlist_items', function (Blueprint $table) {
            $table->dropForeign(['wishlistid']);
            $table->dropForeign(['idavailable']);
        });

        Schema::table('wishlist', function (Blueprint $table) {
            $table->dropForeign(['userid']);
        });
    }
};
