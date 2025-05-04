<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $orders = Order::where('id_client', $user->id_user)->get();
        return response()->json($orders, 200);
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $order = Order::create([
            'id_client' => $user->id_user,
        ]);
        return response()->json($order, 201);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order, 200);
    }
}