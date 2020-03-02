<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @package App\Models
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $appends = ['visitsCount'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'price', 'quantity'];

    /**
     *
     */
    public function categories()
    {
        return $this->morphToMany(
            ProductCategory::class,
            'object',
            'term_relationships',
            null,
            'term_taxonomy_id'
        );
    }

    /**
     * @return \Awssat\Visits\Visits
     */
    public function visits()
    {
        return visits($this);
    }

    /**
     * @return mixed
     */
    public function getVisitsCountAttribute()
    {
        return $this->visits()->count();
    }
}
