<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function findOrCreate(array $data): Product
    {
        return Product::firstOrCreate(
            [
                'article' => $data['article']
            ],
            $data
        );
    }
}
