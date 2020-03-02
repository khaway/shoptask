<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Taxonomy
 *
 * @package App\Models
 */
class Taxonomy extends Model
{
    use Concerns\HasTermFillableAttributes;

    /**
     * {@inheritdoc}
     */
    protected $table = 'term_taxonomy';

    /**
     * {@inheritdoc}
     */
    protected $primaryKey = 'term_taxonomy_id';

    /**
     * {@inheritdoc}
     */
    protected $fillable = ['term_id', 'taxonomy', 'description'];

    /**
     * {@inheritdoc}
     */
    protected $with = ['term'];

    /**
     * {@inheritdoc}
     */
    // protected $appends = ['name'];

    /**
     * Magic method to return the meta data like the post original fields.
     *
     * @param string $key
     * @return string
     */
    public function __get($key)
    {
        if (($value = parent::__get($key)) !== null) {
            return $value;
        }

        if (isset($this->term) && $this->relationLoaded('term')) {
            return  $this->term->{$key};
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new Scopes\TaxonomyScope);
        static::observe(Observers\TaxonomyObserver::class);
    }

    /**
     * Get the taxonomy's id.
     *
     * @return mixed
     */
    public function getIdAttribute()
    {
        return $this->term_taxonomy_id;
    }

    /**
     * Get the taxonomy's id.
     *
     * @return void
     */
    public function setIdAttribute($value): void
    {
        $this->attributes['term_taxonomy_id'] = $value;
    }

    /**
     * Taxonomy term.
     *
     * @return mixed
     */
    public function term()
    {
        return $this->belongsTo(Term::class, 'term_id');
    }

    /**
     * Related entrier helper.
     *
     * @param string $modelClass
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function entries($modelClass)
    {
        return $this->morphedByMany(
            $modelClass, 'object', 'term_relationships', $this->getKeyName()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function newQuery()
    {
        $builder = parent::newQuery();

        if ($taxonomy = $this->getAttribute('taxonomy')) {
            $builder->whereTaxonomy($taxonomy);
        }

        return $builder;
    }
}
