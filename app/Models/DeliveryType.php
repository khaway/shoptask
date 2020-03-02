<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DeliveryType
 *
 * @package App\Models
 */
class DeliveryType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'delivery_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
