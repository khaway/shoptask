<?php

namespace App\Models\Observers;

use App\Models\{Term, Taxonomy};

/**
 * Class TaxonomyObserver
 *
 * @package App\Models\Observers
 */
class TaxonomyObserver
{
    /**
     * Listen to the Taxonomy creating event.
     *
     * @param  Taxonomy  $taxonomy
     * @return void
     */
    public function creating(Taxonomy $taxonomy)
    {

        // If name attribute is set, try to
        // create or find and associate a term with taxonomy.
        if ($taxonomy->name) {
            $term = ['name' => $taxonomy->name];

            if ($taxonomy->slug) {
                $term['slug'] = $taxonomy->slug;
            }

            $taxonomy->term()->associate(Term::firstOrCreate($term));
        }

        // Be sure that unnecessary attributes
        // will not be passed to query.
        unset($taxonomy->name, $taxonomy->slug);
    }
}
