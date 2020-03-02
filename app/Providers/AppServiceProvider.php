<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Coderello\SharedData\Facades\SharedData;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        SharedData::put([
            'baseUrl' => Config::get('app.url'),
            'apiUrls' => [
                'delivery_types' => [
                    'index' => route('delivery_types.index')
                ],
                'products_categories' => [
                    'index' => route('products_categories.index')
                ],
                'products' => [
                    'index' => route('products.index'),
                    'show' => route('products.index')
                ],
                'orders' => [
                    'store' => route('orders.store')
                ],
                'catalog' => [
                    'show' => route('catalog.index')
                ],
                'products_visits' => [
                    'increment' => route('products_visits.increment')
                ]
            ]
        ]);
    }
}
