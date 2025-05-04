<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index($orderId)
    {
        $items = OrderItem::where('id_order', $orderId)->get();
        return response()->json($items, 200);
    }

    public function store(Request $request, $orderId)
    {
        $item = OrderItem::create([
            'id_order' => $orderId,
            'id_product' => $request->id_product,
            'quantity' => $request->quantity,
        ]);
        return response()->json($item, 201);
    }
}
