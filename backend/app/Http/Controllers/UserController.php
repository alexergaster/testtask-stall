<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends BaseController
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
        $this->service->store($data);



        return response()->json(["message" => 'Замовлення успішно оформленно'], 201);
    }

}
