<?php

namespace App\Services;

use App\Models\Category;

class ProductsParseFile
{
    public function __construct(
      protected $productService = new ProductService()
    ) {}

    public function __invoke($file)
    {
        $explode = str_getcsv(file_get_contents($file), "\n");

        foreach ($explode as $item) {
            $productArr = str_getcsv($item, ';');

            if ($productArr[0] == 'Код' || empty($productArr[0])) continue;

            $category = $this->getProductCategory($productArr);

            $data = [
                'article' => $productArr[0],
                'category_id' => $category->id,
                'name' => $productArr[1],
                'price' => (float) str_replace(',', '.', $productArr[5]),
                'price_cp' => (float) str_replace([',', '"'], ['.', ''], $productArr[6]),
                'description' => trim($productArr[13], ','),
                'specifications' => $productArr[8],
                'count' => (float) $productArr[7],
                'units' => str_replace('"', '', $productArr[10]),
                'main_page' => !empty($productArr[12]),
                'image' => (string) $productArr[11],
            ];

            $this->productService->findOrCreate($data);
        }
    }

    /**
     * @param array $data
     * @return Category
     */
    private function getProductCategory(array $data): Category
    {
        $categoryService = new CategoryService;

        $parentCategory = $categoryService->findOrCreate(null, $data[2]);

        if (empty($data[3]))
            return $parentCategory;

        $childrenCategory = $categoryService->findOrCreate((int) $parentCategory->id, $data[3]);

        if (empty($data[4]))
            return $childrenCategory;

        $productCategory = $categoryService->findOrCreate((int) $childrenCategory->id, $data[4]);

        return $productCategory;
    }
}
