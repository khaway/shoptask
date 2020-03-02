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
     * @throws Exception
     */
    public function run()
    {
        $appleCategoriesIds = ProductCategory::ancestorsAndSelf(2)->pluck('term_taxonomy_id');

        Product::create([
            'name' => 'Apple MacBook 2015 Mid Retina',
            'price' => random_int(2000, 10000),
            'quantity' => random_int(0, 4)
        ])->categories()->sync($appleCategoriesIds);

        Product::create([
            'name' => 'Apple MacBook 2013 Mid',
            'price' => random_int(2000, 10000),
            'quantity' => random_int(0, 4)
        ])->categories()->sync($appleCategoriesIds);

        Product::create([
            'name' => 'Apple MacPro 2012',
            'price' => random_int(2000, 10000),
            'quantity' => random_int(0, 4)
        ])->categories()->sync($appleCategoriesIds);

        Product::create([
            'name' => 'Apple iMac 2011',
            'price' => random_int(2000, 10000),
            'quantity' => random_int(0, 4)
        ])->categories()->sync($appleCategoriesIds);

        Product::create([
            'name' => 'Apple iMac 2011',
            'price' => random_int(2000, 10000),
            'quantity' => random_int(0, 4)
        ])->categories()->sync($appleCategoriesIds);

        Product::create([
            'name' => 'Apple iMac 2011',
            'price' => random_int(2000, 10000),
            'quantity' => random_int(0, 4)
        ])->categories()->sync($appleCategoriesIds);

        Product::create([
            'name' => 'Apple iMac 2011',
            'price' => random_int(2000, 10000),
            'quantity' => random_int(0, 4)
        ])->categories()->sync($appleCategoriesIds);

        Product::create([
            'name' => 'Apple iMac 2011',
            'price' => random_int(2000, 10000),
            'quantity' => random_int(0, 4)
        ])->categories()->sync($appleCategoriesIds);

        Product::create([
            'name' => 'Apple iMac 2011',
            'price' => random_int(2000, 10000),
            'quantity' => random_int(0, 4)
        ])->categories()->sync($appleCategoriesIds);

        Product::create([
            'name' => 'Apple iMac 2011',
            'price' => random_int(2000, 10000),
            'quantity' => random_int(0, 4)
        ])->categories()->sync($appleCategoriesIds);

        Product::create([
            'name' => 'Apple iMac 2011',
            'price' => random_int(2000, 10000),
            'quantity' => random_int(0, 4)
        ])->categories()->sync($appleCategoriesIds);

        Product::create([
            'name' => 'Lenova NJ73',
            'price' => random_int(2000, 10000),
            'quantity' => random_int(0, 4)
        ])->categories()->sync(ProductCategory::ancestorsAndSelf(3)->pluck('term_taxonomy_id'));

        Product::create([
            'name' => 'Susumu Yokota - Sakura',
            'price' => random_int(2000, 10000),
            'quantity' => random_int(0, 4)
        ])->categories()->sync(ProductCategory::ancestorsAndSelf(3)->pluck('id'));
    }
}
