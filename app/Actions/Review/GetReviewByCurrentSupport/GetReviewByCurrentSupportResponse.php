<?php


namespace App\Actions\Review\GetReviewByCurrentSupport;


use Illuminate\Database\Eloquent\Collection;

class GetReviewByCurrentSupportResponse
{
    /**
     * @var Collection
     */
    private $collection;

    /**
     * GetReviewByCurrentSupportResponse constructor.
     */
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @return Collection
     */
    public function getCollection(): Collection
    {
        return $this->collection;
    }

    public function toArray(): array
    {
        return $this->collection->toArray();
    }
}
