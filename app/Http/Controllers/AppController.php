<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;

class AppController extends Controller
{
    /**
     *
     */
    public function __invoke()
    {
        // Product::find(1)->categories()->sync(1);
        //
        // Product::create([
        //    'name' => 'sooome2'
        // ]);
        //

        //
        // ProductCategory::create([
        //    'name' => 'some2223123!',
        //     'children' => [
        //         ['name' => 'sure']
        //     ]
        // ]);
        //
        // dd(123);

        return view('app');
    }
}
