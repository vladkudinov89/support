<?php


namespace App\Actions\Search\Support;


use Illuminate\Database\Eloquent\Collection;

class SearchSupportResponse
{
    /**
     * @var Collection
     */
    private $collection;

    /**
     * SearchSupportResponse constructor.
     */
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function toArray(): array
    {
        return $this->collection->toArray();
    }
}
