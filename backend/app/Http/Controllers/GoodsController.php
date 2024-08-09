<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Illuminate\Http\JsonResponse;

class GoodsController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Goods::all());
    }
}
