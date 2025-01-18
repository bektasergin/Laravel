<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function list()
    {
        try {
            $products = Product::where('is_deleted', 0)
                ->select('id', 'guid', 'name', 'description', 'price', 'stock', 'created_at')
                ->get();
                
            return response()->json([
                'status' => true,
                'data' => $products
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve products',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function create(ProductRequest $request)
    {
        try {
            $product = new Product();
            $product->name = $request->input('name');
            $product->guid = Str::uuid();
            $product->price = $request->input('price');
            $product->stock = $request->input('stock');
            $product->description = $request->input('description');
            $product->created_at = Carbon::now();
            $product->save();

            return response()->json([
                'status' => true,
                'message' => 'Ürün oluşturma başarılı!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Ürün oluşturma başarısız!',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}