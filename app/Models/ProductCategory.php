<?php

namespace App\Models;

/**
 * Class ProductCategory
 *
 * @package App\Models
 */
class ProductCategory extends NestedTaxonomy
{
    /**
     * @var array
     */
    protected $attributes = [
        'taxonomy' => 'product_category'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->entries(Product::class);
    }
}
