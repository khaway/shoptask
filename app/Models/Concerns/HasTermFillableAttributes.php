<?php

namespace App\Models\Concerns;

/**
 * Trait HasTermFillableAttributes
 *
 * @package App\Models\Concerns
 */
trait HasTermFillableAttributes
{
    /**
     * @var array
     */
    protected array $termFillable = ['name', 'slug'];

    /**
     * @return void
     */
    public function initializeHasTermFillableAttributes(): void
    {
        $this->addTermFillableAttributes();
    }

    /**
     * @return $this
     */
    private function addTermFillableAttributes(): self
    {
        $this->fillable(array_merge(
            $this->getFillable(), $this->getTermFillable(),
        ));

        return $this;
    }

    /**
     * @return array
     */
    public function getTermFillable(): array
    {
        return $this->termFillable;
    }

    /**
     * @param array $termFillable
     * @return $this
     */
    public function termFillable(array $termFillable): self
    {
        $this->termFillable = $termFillable;

        return $this;
    }
}
