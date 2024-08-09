<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Category::all());
    }
    public function show($id): JsonResponse
    {
        $category = Category::with('products')->find($id);

        return response()->json($category);
    }
}
