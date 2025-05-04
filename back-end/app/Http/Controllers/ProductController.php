<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::all();
            return response()->json($products, 200);
        } catch (\Exception $e) {
            Log::error('Error in ProductController@index: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response()->json(['message' => 'An error occurred while fetching products.', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);
            return response()->json($product, 200);
        } catch (\Exception $e) {
            Log::error('Error in ProductController@show: ' . $e->getMessage(), ['id' => $id, 'trace' => $e->getTraceAsString()]);
            return response()->json(['message' => 'An error occurred while fetching the product.', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            Log::info('ProductController@store request data', $request->all());

            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'unit' => 'nullable|string|max:255',
                'id_category' => 'required|exists:categories,id_category', // Updated to categories
            ]);

            $product = Product::create($request->only(['name', 'description', 'unit', 'id_category']));
            return response()->json($product, 201);
        } catch (\Exception $e) {
            Log::error('Error in ProductController@store: ' . $e->getMessage(), ['request' => $request->all(), 'trace' => $e->getTraceAsString()]);
            return response()->json(['message' => 'An error occurred while creating the product.', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            Log::info('ProductController@update request data', $request->all());

            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'unit' => 'nullable|string|max:255',
                'id_category' => 'required|exists:categories,id_category', // Updated to categories
            ]);

            $product = Product::findOrFail($id);
            $product->update($request->only(['name', 'description', 'unit', 'id_category']));
            return response()->json($product, 200);
        } catch (\Exception $e) {
            Log::error('Error in ProductController@update: ' . $e->getMessage(), ['id' => $id, 'request' => $request->all(), 'trace' => $e->getTraceAsString()]);
            return response()->json(['message' => 'An error occurred while updating the product.', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json(['message' => 'Product deleted'], 200);
        } catch (\Exception $e) {
            Log::error('Error in ProductController@destroy: ' . $e->getMessage(), ['id' => $id, 'trace' => $e->getTraceAsString()]);
            return response()->json(['message' => 'An error occurred while deleting the product.', 'error' => $e->getMessage()], 500);
        }
    }
}