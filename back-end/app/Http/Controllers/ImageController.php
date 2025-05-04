<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return response()->json($images, 200);
    }

    public function store(Request $request)
    {
        $image = Image::create($request->only(['uri']));
        return response()->json($image, 201);
    }
}

// app/Http/Controllers/WishlistItemController.php
namespace App\Http\Controllers;

use App\Models\WishlistItem;
use Illuminate\Http\Request;

class WishlistItemController extends Controller
{
    public function index($wishlistId)
    {
        $items = WishlistItem::where('id_wishlist', $wishlistId)->get();
        return response()->json($items, 200);
    }

    public function store(Request $request, $wishlistId)
    {
        $item = WishlistItem::create([
            'id_wishlist' => $wishlistId,
            'id_product' => $request->id_product,
        ]);
        return response()->json($item, 201);
    }

    public function destroy($id)
    {
        $item = WishlistItem::findOrFail($id);
        $item->delete();
        return response()->json(['message' => 'Wishlist item deleted'], 200);
    }
}