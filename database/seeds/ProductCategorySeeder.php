<?php

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

/**
 * Class ProductCategorySeeder
 */
class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->productCategories() as $productCategory) {
            ProductCategory::create($productCategory);
        }
    }

    /**
     * @return array
     */
    public function productCategories(): array
    {
        return [
            [
                'name' => 'Notebooks',
                'children' => [
                    ['name' => 'Apple'],
                    ['name' => 'Lenovo']
                ]
            ],
            [
                'name' => 'Servers',
                'children' => [
                    ['name' => 'Intel'],
                    ['name' => 'IBM']
                ]
            ]
        ];
    }
}
