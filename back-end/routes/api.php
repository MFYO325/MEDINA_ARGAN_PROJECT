<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AvailableValueController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\WishlistItemController;
use App\Http\Controllers\AuthController;


Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    Route::get('/carts', [CartController::class, 'index']);
    Route::post('/carts', [CartController::class, 'store']);
    Route::get('/carts/{id}', [CartController::class, 'show']);
    Route::delete('/carts/{id}', [CartController::class, 'destroy']);

    Route::get('/carts/{cartId}/items', [CartItemController::class, 'index']);
    Route::post('/carts/{cartId}/items', [CartItemController::class, 'store']);
    Route::put('/cart-items/{id}', [CartItemController::class, 'update']);
    Route::delete('/cart-items/{id}', [CartItemController::class, 'destroy']);

    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);

    Route::get('/orders/{orderId}/items', [OrderItemController::class, 'index']);
    Route::post('/orders/{orderId}/items', [OrderItemController::class, 'store']);

    Route::get('/wishlists/{wishlistId}/items', [WishlistItemController::class, 'index']);
    Route::post('/wishlists/{wishlistId}/items', [WishlistItemController::class, 'store']);
    Route::delete('/wishlist-items/{id}', [WishlistItemController::class, 'destroy']);
});

// Public Routes
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

Route::get('/products/{productId}/available-values', [AvailableValueController::class, 'index']);
Route::post('/products/{productId}/available-values', [AvailableValueController::class, 'store']);
Route::put('/available-values/{id}', [AvailableValueController::class, 'update']);
Route::delete('/available-values/{id}', [AvailableValueController::class, 'destroy']);

Route::get('/images', [ImageController::class, 'index']);
Route::post('/images', [ImageController::class, 'store']);

// Fallback for debugging
Route::fallback(function () {
    return response()->json(['message' => 'Route not found. Please check the URL and method.'], 404);
});