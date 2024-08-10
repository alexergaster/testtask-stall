<?php

namespace App\Services\User;

use App\Models\User;

class Service
{
    public function store($data): void
    {
        $products = $data['productsId'];
        unset($data['productsId']);

        $user = User::firstOrCreate($data);

        foreach ($products as $product) {
            $user->orders()->attach($product['id'], ['quantity' => $product['quantity']]);
        }
    }
}
