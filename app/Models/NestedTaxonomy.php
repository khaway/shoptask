<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;

/**
 * Class NestedTaxonomy
 *
 * @package App\Models
 */
class NestedTaxonomy extends Taxonomy
{
    use NodeTrait;
}
