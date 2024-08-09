<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Illuminate\Http\JsonResponse;

class GoodsController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Goods::with('category')->get();
        return response()->json($products);
    }
    public function show($id): JsonResponse
    {
        $product = Goods::with('category')->find($id);
        return response()->json($product);
    }

}
