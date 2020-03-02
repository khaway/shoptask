<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    /**
     * {@inheritdoc}
     */
    protected $table = 'terms';

    /**
     * {@inheritdoc}
     */
    protected $primaryKey = 'term_id';

    /**
     * {@inheritdoc}
     */
    protected $fillable = ['term_id', 'name', 'slug', 'term_group'];

    /**
     * {@inheritdoc}
     */
    protected static function boot()
    {
        parent::boot();

        static::observe(Observers\TermObserver::class);
    }

    /**
     * Taxonomy relation helper.
     *
     * @param string $modelClass
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function taxonomyRelation($modelClass)
    {
        return $this->hasMany($modelClass, $this->getKeyName());
    }
}
