<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class TaxonomyScope
 *
 * @package App\Models\Scopes
 */
class TaxonomyScope implements Scope
{
    /**
     * All of the extensions to be added to the builder.
     *
     * @var array
     */
    protected $extensions = ['WhereTaxonomy', 'WhereSlug', 'WhereName'];

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        //
    }

    /**
     * Extend the query builder with the needed functions.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    public function extend(Builder $builder)
    {
        foreach ($this->extensions as $extension) {
            $this->{"add{$extension}"}($builder);
        }
    }

    /**
     * Add the taxonomy extension to the builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    protected function addWhereTaxonomy(Builder $builder)
    {
        $builder->macro('whereTaxonomy', function (Builder $builder, $taxonomy, $slug = null) {
            $builder->where('taxonomy', $taxonomy);

            if ($slug) {
                $builder->slug($slug);
            }

            return $builder;
        });
    }

    /**
     * Add the slug extension to the builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    protected function addWhereSlug(Builder $builder)
    {
        $builder->macro('whereSlug', function (Builder $builder, $slug) {
            if (! is_array($slug)) {
                $slug = func_get_args();
                $slug = array_splice($slug, 1);
            }

            return $builder->whereHas('term', function ($query) use ($slug) {
                $query->whereIn('slug', $slug);
            });
        });
    }

    /**
     * Add the slug extension to the builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    protected function addWhereName(Builder $builder)
    {
        $builder->macro('whereName', function (Builder $builder, $name) {
            if (! is_array($name)) {
                $name = func_get_args();
                $name = array_splice($name, 1);
            }

            return $builder->whereHas('term', function ($query) use ($name) {
                $query->whereIn('name', $name);
            });
        });
    }
}
