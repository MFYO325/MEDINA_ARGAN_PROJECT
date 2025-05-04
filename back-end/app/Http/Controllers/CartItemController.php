<?php
namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function index($cartId)
    {
        $items = CartItem::where('id_cart', $cartId)->get();
        return response()->json($items, 200);
    }

    public function store(Request $request, $cartId)
    {
        $item = CartItem::create([
            'id_cart' => $cartId,
            'id_product' => $request->id_product,
            'quantity' => $request->quantity,
        ]);
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $item = CartItem::findOrFail($id);
        $item->update($request->only(['quantity']));
        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        $item = CartItem::findOrFail($id);
        $item->delete();
        return response()->json(['message' => 'Cart item deleted'], 200);
    }
}
