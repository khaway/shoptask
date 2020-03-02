<?php

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Apple MacBook 2015 Mid Retina',
            'price' => 3000,
            'quantity' => 1
        ])->categories()->sync(ProductCategory::ancestorsAndSelf(2)->pluck('term_taxonomy_id'));

        Product::create([
            'name' => 'Lenove NJ73',
            'price' => 2500,
            'quantity' => 0
        ])->categories()->sync(ProductCategory::ancestorsAndSelf(3)->pluck('term_taxonomy_id'));
        //
        // Product::create([
        //     'name' => 'Susumu Yokota - Sakura',
        //     'price' => 22.3,
        //     'quantity' => 4
        // ])->categories()->sync(ProductCategory::ancestorsAndSelf(3)->pluck('id'));
    }
}
