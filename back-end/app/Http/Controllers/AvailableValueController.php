<?php

namespace App\Http\Controllers;

use App\Models\AvailableValue;
use Illuminate\Http\Request;

class AvailableValueController extends Controller
{
    public function index($productId)
    {
        $values = AvailableValue::where('id_product', $productId)->get();
        return response()->json($values, 200);
    }

    public function store(Request $request, $productId)
    {
        $value = AvailableValue::create([
            'id_product' => $productId,
            'id_img' => $request->id_img,
            'real_price' => $request->real_price,
            'sell_price' => $request->sell_price,
            'quantity' => $request->quantity,
        ]);
        return response()->json($value, 201);
    }

    public function update(Request $request, $id)
    {
        $value = AvailableValue::findOrFail($id);
        $value->update($request->only(['id_img', 'real_price', 'sell_price', 'quantity']));
        return response()->json($value, 200);
    }

    public function destroy($id)
    {
        $value = AvailableValue::findOrFail($id);
        $value->delete();
        return response()->json(['message' => 'Available value deleted'], 200);
    }
}

