<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function findOrCreate(int $parentId = null, string $name)
    {
        return Category::firstOrCreate(
            [
                'parent_id' => $parentId,
                'name' => $name,
            ],
            [
                'parent_id' => $parentId,
                'name' => $name,
            ]
        );
    }
}
