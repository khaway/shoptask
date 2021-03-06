<?php

namespace App\Models\Observers;

use App\Models\Term;

/**
 * Class TermObserver
 *
 * @package App\Models\Observers
 */
class TermObserver
{
    /**
     * Listen to the Term creating event.
     *
     * @param  Term  $term
     * @return void
     */
    public function creating(Term $term)
    {
        // If term slug not set, convert name to slug
        // using "setSlugAttribute" mutator.
        if (! $term->slug) {
            $term->slug = $term->name;
        }
    }
}
