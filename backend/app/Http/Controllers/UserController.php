<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(User::all());
    }

    public function show($id): JsonResponse
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function store(UserRequest $request): JsonResponse
    {

        $data = $request->validated();

        $products = $data['productsId'];
        unset($data['productsId']);

        $user = User::firstOrCreate($data);

        foreach ($products as $product) {
            $user->orders()->attach($product['id'], ['quantity' => $product['quantity']]);
        }

        return response()->json(["message" => 'Замовлення успішно оформленно'], 201);
    }

}
